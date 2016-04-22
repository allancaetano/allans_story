<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrinho extends CI_Controller {
    
    private $categorias;

    function __construct() {
        parent::__construct();
        $this->load->model('categorias_model', 'modelcategorias');
        $this->categorias = $this->modelcategorias->listar_categorias();
    }
    
    public function index() {
        $data_header['categorias'] = $this->categorias;
        if (NULL != $this->session->userdata('logado')) {
            $sessao = $this->session->userdata();
            $cep = str_replace("-", "", $sessao['cliente']->cep);
            $data['frete'] = $this->calcular_frete($cep);
            //$estado = $sessao['cliente']->estado;
            //$data['frete'] = $this->frete_transportadora($estado);   
        } else {
            $data['frete'] = NULL;
        }
        $this->load->view('html-header');
        $this->load->view('header', $data_header);
        $this->load->view('carrinho', $data);
        $this->load->view('footer');
        $this->load->view('html-footer');
    }
    
    public function adicionar() {  
        $data = array('id'          => $this->input->post('id'),
                      'qty'         => $this->input->post('quantidade'),
                      'price'       => $this->input->post('preco'),
                      'name'        => $this->input->post('nome'),
                      'altura'      => $this->input->post('altura'),
                      'comprimento' => $this->input->post('comprimento'),
                      'largura'     => $this->input->post('largura'),
                      'peso'        => $this->input->post('peso'),
                      'options'     => NULL,
                      'url'         => $this->input->post('url'),
                      'foto'        => $this->input->post('foto'));
        $this->cart->insert($data);
        redirect(base_url("carrinho"));
    }
    
    public function atualizar() {
        foreach ($this->input->post() as $item) {
            if (isset($item['rowid'])) {
                $data = array('rowid' => $item['rowid'], 'qty' => $item['qty']);
                $this->cart->update($data);
            }
        }
        redirect(base_url('carrinho'));
    }
    
    public function remover($rowid) {
        $data = array('rowid' => $rowid, 'qty' => 0);
        $this->cart->update($data);
        redirect(base_url('carrinho'));
    }
    
    public function calcular_frete($cep_destino) {
        $maior_alt = $maior_lar = $maior_comp = $cm_cub = $peso = 0;
        foreach ($this->cart->contents() as $item) {
            if ($item['altura'] > $maior_alt) {
                $maior_alt = $item['altura'];
            }
            if ($item['largura'] > $maior_lar) {
                $maior_lar = $item['largura'];
            }
            if ($item['comprimento'] > $maior_comp) {
                $maior_comp = $item['comprimento'];
            }
            $cm_cub += ((($item['altura']/10) * ($item['largura']/10) * ($item['comprimento']/10))/100) * $item['qty'];
            $peso += ($item['peso'] * $item['qty']);
        }
        $maiores_dimensoes = array('alt' => $maior_alt, 'lar' => $maior_lar, 'comp' => $maior_comp);
        arsort($maiores_dimensoes);
        foreach ($maiores_dimensoes as $chave => $valor) {
            $caixa[] = $valor;
        }
        $dimensao1 = $caixa[0];
        $dimensao2 = $caixa[1];
        $dimensao3 = 1;
        $caixas = 1;
        while (((($dimensao1 / 10) * ($dimensao2 / 10) * ($dimensao3 / 10)) / 100) < $cm_cub) {
            $dimensao3 ++;
            if ($dimensao3 % 1000 == 0) {
                $caixas ++;
            }
        }
        if ($caixas > 1) {
            $dimensao3 = $dimensao3 - (($caixas - 1) * 1000);
        }
        $cep_origem = '01103200'; // CEP do Mercadão Municipal de São Paulo
        $preco_correio = 0.00;
        if ($caixas == 1) {
            $preco_correio = $this->correio($cep_origem, $cep_destino, ($dimensao1/10), ($dimensao2/10), ($dimensao3/10), ($peso/1000));
        } elseif ($caixas > 1) {
            $peso = ($peso / $caixas);
            for ($i = $caixas; $i > 0; $i--) {
                if ($i > 1) {
                    $preco_correio += $this->correio($cep_origem, $cep_destino, ($dimensao1/10), ($dimensao2/10), 100, ($peso/1000));
                } else {
                    $preco_correio += $this->correio($cep_origem, $cep_destino, ($dimensao1/10), ($dimensao2/10), ($dimensao3/10), ($peso/1000));
                }
            }
        }
        if (count($this->cart->contents()) == 0) {
            $preco_correio = 0.00;
        }
        return $preco_correio;
    }
    
    public function correio($cep_origem, $cep_destino, $comprimento, $altura, $largura, $peso) {
        if ($altura < 2) { // A altura não pose ser inferior a 2cm 
            $altura = 2;
        }
        if ($largura < 11) { // A largura não pose ser inferior a 11cm 
            $largura = 11;
        }
        if ($comprimento < 16) { // O comprimento não pose ser inferior a 16cm 
            $comprimento = 16;
        }
        $data['nCdEmpresa'] = '';
        $data['sDsSenha'] = '';
        $data['sCepOrigem'] = $cep_origem;
        $data['sCepDestino'] = $cep_destino;
        $data['nVlPeso'] = $peso;
        $data['nCdFormato'] = 1;
        $data['nVlComprimento'] = $comprimento;
        $data['nVlAltura'] = $altura;
        $data['nVlLargura'] = $largura;
        $data['nVlDiametro'] = 0;
        $data['sCdMaoPropria'] = 'S';
        $data['nVlValorDeclarado'] = 0;
        $data['sCdAvisoRecebimento'] = 'N';
        $data['StrRetorno'] = 'xml';
        $data['nCdServico'] = '40010'; // 41106 PAC, 40010 SEDEX, 40045 SEDEX a Cobrar, 40215 SEDEX 10
        $data = http_build_query($data);
        $url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';
        $curl = curl_init($url . '?' . $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($curl);
        $result = simplexml_load_string($result);
        foreach ($result->cServico as $row) {
            if ($row->Erro == 0) {
                return $row->Valor;
            } else {
                echo "<pre>";
                print_r($row);
//                $data_header['categorias'] = $this->categorias;
//                $this->load->view('html-header');
//                $this->load->view('header', $data_header);
//                $this->load->view('erro_calculo_frete', $data);
//                $this->load->view('footer');
//                $this->load->view('html-footer');
            }
        }
    }
    
    public function frete_transportadora($estado_destino) {
        $peso = 0;
        foreach ($this->cart->contents() as $item) {
            $peso += ($item['peso'] * $item['qty']);
            $peso = ceil($peso / 1000);
            $custo_frete = $this->db->query("SELECT * FROM tb_transporte_preco WHERE ucase(uf) = ucase('" . $estado_destino . "') AND peso_ate >= " .
            $peso . " ORDER BY preco LIMIT 1")->result();
            if (count($custo_frete) < 1) {
                $custo_frete = $this->db->query("SELECT * FROM tb_transporte_preco WHERE ucase(uf) = ucase('" . $estado_destino . "')"  .
                " ORDER BY peso_ate DESC LIMIT 1")->result();
                print_r($custo_frete);
                if (count($custo_frete) < 1) {
                    $custo_frete = $this->db->query("SELECT * FROM tb_transporte_preco ORDER BY preco DESC LIMIT 1")->result();
                }
            }
            $adicional = 0;
            if ($peso > $custo_frete[0]->peso_ate) {
                $adicional = ($peso - $custo_frete[0]->peso_ate) * $custo_frete[0]->adicional_kg;
            }
            $preco_frete = ($custo_frete[0]->preco + $adicional);
            return $preco_frete;
        }
    }
    
    public function form_pagamento() {
        $data_header['categorias'] = $this->categorias;
        if (NULL != $this->session->userdata('logado')) {
            $sessao = $this->session->userdata();
            $cep = str_replace("-", "", $sessao['cliente']->cep);
            $data['frete'] = $this->calcular_frete($cep);
        } else {
            $data['frete'] = NULL;
        }
        $this->load->view('html-header');
        $this->load->view('header', $data_header);
        $this->load->view('carrinho-formulario-pagamento', $data);
        $this->load->view('footer');
        $this->load->view('html-footer');
    }
    
    public function finalizar_compra() {
        if (NULL != $this->session->userdata('logado')) {
            $sessao = $this->session->userdata();
            $frete = $this->calcular_frete(str_replace("-", "", $sessao['cliente']->cep));
            if ($this->input->post('tipo_pagamento') == 'cartao') {
                // LÓGICA DE PAGAMENTO COM CARTÃO
                $this->load->library('form_validation');
                $this->form_validation->set_rules('cartao_nome', 'Nome do Cartão', 'required');
                $this->form_validation->set_rules('cartao_numero', 'Número do Cartão', 'required');
                $this->form_validation->set_rules('cartao_validade', 'Validade do Cartão', 'required');
                $this->form_validation->set_rules('cartao_cvv', 'Código de Segurança', 'required');
                if ($this->form_validation->run() == FALSE) {
                    $this->form_pagamento();
                } else {
                    $this->db->trans_start();
                    $dados['cliente'] = $sessao['cliente']->id;
                    $dados['produtos'] = $this->cart->total();
                    $dados['frete'] = (double)str_replace(",", ".", $frete);
                    $dados['status'] = 0;
                    $dados['comentarios'] = "Novo pedido inserido no sistema";
                    $this->db->insert('pedidos', $dados);
                    $pedido = $this->db->insert_id();
                    foreach ($this->cart->contents() as $item) {
                        $dados_item['pedido'] = $pedido;
                        $dados_item['item'] = $item['id'];
                        $dados_item['quantidade'] = $item['qty'];
                        $dados_item['preco'] = $item['price'];
                        $this->db->insert('itens_pedidos', $dados_item);
                    }
                    $total_a_cobrar = (double)($this->cart->total() + (double)str_replace(",", ".", $frete));
                    if ($this->input->post('parcelamento') == 1) {
                        $operacao = 'credito_a_vista';
                    } else {
                        $operacao = 'parcelado_loja';
                    }
                    require_once('./locaweb-gateway-php-master/LocawebGateway.php');
                    $array_pedido = array('numero'    => $pedido,
                                          'total'     => $total_a_cobrar,
                                          'moeda'     => 'real',
                                          'descricao' => 'Pedido:' . $pedido);

                    $array_pagamento = array('meio_pagamento'      => 'cielo',
                                             'parcelas'            => $this->input->post('parcelamento'),
                                             'tipo_operacao'       => $operacao,
                                             'bandeira'            => $this->input->post('bandeira'),
                                             'nome_titular_cartao' => $this->input->post('nome_cartao'),
                                             'cartao_numero'       => str_replace(" ", "", $this->input->post('numero_cartao')),
                                             'cartao_cvv'          => $this->input->post('cartao_cvv'),
                                             'cartao_validade'     => str_replace("/", "", $this->input->post('cartao_validade')));

                    $array_comprador = array('nome'      => $sessao['cliente']->nome,
                                             'documento' => $sessao['cliente']->cpf,
                                             'endereco'  => $sessao['cliente']->rua,
                                             'numero'    => $sessao['cliente']->numero,
                                             'cep'       => $sessao['cliente']->cep,
                                             'bairro'    => $sessao['cliente']->bairro,
                                             'cidade'    => $sessao['cliente']->cidade,
                                             'estado'    => $sessao['cliente']->estado);

                    $array_transacao = array('url_retorno' => base_url('carrinho/finalizar_compra'),
                                             'capturar'    => TRUE,
                                             'pedido'      => $array_pedido,
                                             'pagamento'   => $array_pagamento,
                                             'comprador'   => $array_comprador);

                    $transacao = LocawebGateway::criar($array_transacao)->sendRequest();
                    if (! $transacao->transacao->erro) {
                        $this->db->trans_commit();
                        $this->cart->destroy();                   
                        // DISPARO DE E-MAIL COM INFORMAÇÕES DO PEDIDO
                        $dados_email['pedido'] = $array_pedido;
                        $dados_email['comprador'] = $array_comprador;
                        $dados_email['transacao'] = $transacao;
                        $this->enviar_confirmacao($dados_email, $sessao['cliente']->email);
                    } else {
                        $this->db->trans_rollback();
                    }
                    $dados_retorno['transacao'] = $transacao;
                    $data_header['categorias'] = $this->categorias;
                    $this->load->view('html-header');
                    $this->load->view('header', $data_header);
                    $this->load->view('retorno_cartao', $dados_retorno);
                    $this->load->view('footer');
                    $this->load->view('html-footer');
                    $this->db->trans_complete();
                }
            } else if ($this->input->post('tipo_pagamento') == 'boleto') {
                // LÓGICA DO PAGAMENTO COM BOLETO
                $this->db->trans_start();
                $dados['cliente'] = $sessao['cliente']->id;
                $dados['produtos'] = $this->cart->total();
                $dados['frete'] = (double)  str_replace(",", ".", $frete);
                $dados['status'] = 0;
                $dados['comentarios'] = "Novo pedido inserido no sistema";
                $this->db->insert('pedidos', $dados);
                $pedido = $this->db->insert_id();
                foreach ($this->cart->contents() as $item) {
                    $dados_item['pedido'] = $pedido;
                    $dados_item['item'] = $item['id'];
                    $dados_item['quantidade'] = $item['qty'];
                    $dados_item['preco'] = $item['price'];
                    $this->db->insert('itens_pedidos', $dados_item);
                }
                $total_a_cobrar = (double)($this->cart->total() + (double)str_replace(",", ".", $frete));
                require_once('./locaweb-gateway-php-master/LocawebGateway.php');
                $array_pedido = array('numero'    => $pedido,
                                      'total'     => $total_a_cobrar,
                                      'moeda'     => 'real',
                                      'descricao' => 'Pedido:' . $pedido);
                
                $vencimento_boleto = date('dmY', strtotime('+1 week')); // Uma semana de pazo para pagar o boleto

                $array_pagamento = array('meio_pagamento'  => 'boleto_itau',
                                         'data_vencimento' => $vencimento_boleto);

                $array_comprador = array('nome'      => $sessao['cliente']->nome,
                                         'documento' => $sessao['cliente']->cpf,
                                         'endereco'  => $sessao['cliente']->rua,
                                         'numero'    => $sessao['cliente']->numero,
                                         'cep'       => $sessao['cliente']->cep,
                                         'bairro'    => $sessao['cliente']->bairro,
                                         'cidade'    => $sessao['cliente']->cidade,
                                         'estado'    => $sessao['cliente']->estado);

                $array_transacao = array('url_retorno' => base_url('carrinho/finalizar_compra'),
                                         'capturar'    => TRUE,
                                         'pedido'      => $array_pedido,
                                         'pagamento'   => $array_pagamento,
                                         'comprador'   => $array_comprador);

                $transacao = LocawebGateway::criar($array_transacao)->sendRequest();
                if (! $transacao->transacao->erro) {
                    $this->db->trans_commit();
                    $this->cart->destroy();                   
                    // DISPARO DE E-MAIL COM INFORMAÇÕES DO PEDIDO
                    $dados_email['pedido'] = $array_pedido;
                    $dados_email['comprador'] = $array_comprador;
                    $dados_email['transacao'] = $transacao;
                    $this->enviar_confirmacao($dados_email, $sessao['cliente']->email);
                } else {
                    $this->db->trans_rollback();
                }
                $dados_retorno['transacao'] = $transacao;
                $data_header['categorias'] = $this->categorias;
                $this->load->view('html-header');
                $this->load->view('header', $data_header);
                $this->load->view('retorno_boleto', $dados_retorno);
                $this->load->view('footer');
                $this->load->view('html-footer');
                $this->db->trans_complete();
            } else {
                redirect(base_url('pagar-e-finalizar-compra'));
            }
        } else {
            redirect(base_url('login'));
        }
    }
    
    public function enviar_confirmacao($dados, $para) {
        $this->load->library('my_phpmailer');
        $obj_email = new PHPMailer();
        $obj_email->isSMTP();              
        $obj_email->Host = "smtp.gmail.com";
        $obj_email->Port = 587;
        $obj_email->SMTPSecure = 'tls';
        $obj_email->SMTPAuth = TRUE;
        $obj_email->Username = "###########@gmail.com";
        $obj_email->Password = "###########";
        $obj_email->setFrom("###########@gmail.com", "The Allan's Store Brazil");
        $obj_email->addAddress($para);
        $obj_email->CharSet = "utf-8";
        $obj_email->Subject = "Pedido: " . $dados['pedido']['numero'];
        $obj_email->msgHTML($this->load->view('emails/novo_pedido'), $dados, TRUE);
        $obj_email->send();
    }
}




















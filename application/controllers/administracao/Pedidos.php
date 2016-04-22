<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('usuarios_model', 'modelusuarios');
        $this->modelusuarios->validar($this->router->class, $this->router->method);
        
        $this->load->model('pedidos_model', 'modelpedidos');
        $this->load->library('table');
    }
    
    public function index() {
        $dados['total'] = $this->modelpedidos->contar();
        $dados['grafico'] = $this->modelpedidos->estatisticas();
        $dados['pedidos'] = $this->modelpedidos->listar($this->input->post('filtro'), $this->input->post('numero_nome'));
        $this->load->view('administracao/html_header');
        $this->load->view('administracao/header');
        $this->load->view('administracao/pedidos', $dados);
        $this->load->view('administracao/footer');
        $this->load->view('administracao/html_footer');
    }
    
    public function detalhes($pedido) {
        $dados = $this->modelpedidos->detalhes($pedido);
        $this->load->view('administracao/html_header');
        $this->load->view('administracao/header');
        $this->load->view('administracao/pedido', $dados);
        $this->load->view('administracao/footer');
        $this->load->view('administracao/html_footer');
    }
    
    public function alterar_status() {
        $id = $this->input->post('pedido_id');
        $status = $this->input->post('status');
        $comentarios = $this->input->post('comentarios');
        if ($this->modelpedidos->alterar_status($id, $status, $comentarios)) {
            $dados = $this->modelpedidos->detalhes(md5($id));
            $this->load->library('my_phpmailer');
            $obj_email = new PHPMailer();
            $obj_email->isSMTP();              
            $obj_email->Host = "smtp.gmail.com";
            $obj_email->Port = 587;
            $obj_email->SMTPSecure = 'tls';
            $obj_email->SMTPAuth = TRUE;
            $obj_email->Username = "#########@gmail.com";
            $obj_email->Password = "#############";
            $obj_email->setFrom("##########@gmail.com", "The Allan's Store Brazil");
            $obj_email->addAddress($dados['cliente'][0]->email);
            $obj_email->CharSet = "utf-8";
            $obj_email->Subject = "Pedido: " . $id;
            $obj_email->msgHTML($this->load->view('emails/atualizacao_pedido', $dados, TRUE));
            if ($obj_email->send()) {
                redirect(base_url("administracao/pedidos/detalhes/" . md5($id)));
            } else {
                echo "Error - Erro ao tentar enviar o e-mail com a atualização do pedido";
            }
        }
    }
    
    public function excluir($pedido) {
        if ($this->modelpedidos->excluir($pedido)) {
            redirect(base_url('administracao/pedidos'));
        } else {
            echo "Houve algum erro ao excluir o pedido";
        }
    }
}
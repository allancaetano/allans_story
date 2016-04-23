<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends CI_Controller {
    
    private $categorias;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('usuarios_model', 'modelusuarios');
        $this->modelusuarios->validar($this->router->class, $this->router->method);
        
        $this->load->model('categorias_model', 'modelcategorias');
        $this->categorias = $this->modelcategorias->listar_categorias();
        $this->load->model('produtos_model', 'modelprodutos');
    }
    
    public function index($pular = NULL) {
        $this->load->library('table');
        $this->load->library('pagination');
        $config['base_url'] = base_url("administracao/produtos/index");
        $config['total_rows'] = $this->modelprodutos->contar();
        $produto_por_pagina = 5;
        $config['per_page'] = $produto_por_pagina;
        $this->pagination->initialize($config);
        $dados['links_paginacao'] = $this->pagination->create_links();
        $dados['produtos'] = $this->modelprodutos->listar($pular, $produto_por_pagina);
        $dados['categorias'] = $this->categorias;
        $this->load->view('administracao/html_header');
        $this->load->view('administracao/header');
        $this->load->view('administracao/produtos', $dados);
        $this->load->view('administracao/footer');
        $this->load->view('administracao/html_footer');
    }
    
    public function adicionar() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt_codigo', 'Código do produto', 'required|exact_length[7]|is_unique[produtos.codigo]|alpha_numeric');
        $this->form_validation->set_rules('txt_titulo', 'Nome do produto', 'required|min_length[3]|is_unique[produtos.titulo]');
        $this->form_validation->set_rules('txt_preco', 'Preço', 'required');
        $this->form_validation->set_rules('txt_largura_caixa_mm', 'Largura da caixa', 'required');
        $this->form_validation->set_rules('txt_altura_caixa_mm', 'Altura da caixa', 'required');
        $this->form_validation->set_rules('txt_comprimento_caixa_mm', 'Comprimento da caixa', 'required');
        $this->form_validation->set_rules('txt_peso_gramas', 'Peso', 'required');
        $this->form_validation->set_rules('txt_descricao', 'Descrição', 'required|min_length[20]');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $dados['codigo'] = $this->input->post('txt_codigo');
            $dados['titulo'] = $this->input->post('txt_titulo');
            //$dados['categoria'] = $this->input->post('txt_categoria');
            $dados['preco'] = $this->input->post('txt_preco');
            $dados['largura_caixa_mm'] = $this->input->post('txt_largura_caixa_mm');
            $dados['altura_caixa_mm'] = $this->input->post('txt_altura_caixa_mm');
            $dados['comprimento_caixa_mm'] = $this->input->post('txt_comprimento_caixa_mm');
            $dados['peso_gramas'] = $this->input->post('txt_peso_gramas');
            $dados['descricao'] = $this->input->post('txt_descricao');
            if ($this->modelprodutos->adicionar($dados)) {
                redirect(base_url('administracao/produtos'));
            } else {
                echo "Houve um erro ao cadastrar o produto.";
            }
        }
    }

    public function excluir($produto) {
        if ($this->modelprodutos->excluir($produto)) {
            unlink('./assets/img/produtos/'. $produto . '.jpg'); // Exclui arquivo
            redirect(base_url('administracao/produtos'));
        } else {
            echo "Houve um erro ao excluir a categoria";
        }
    }
    
    public function alterar($produto) {
        $dados['categorias'] = $this->categorias;
        $dados['produto'] = $this->modelprodutos->detalhes_produto_md5($produto);
        $this->load->view('administracao/html_header');
        $this->load->view('administracao/header');
        $this->load->view('administracao/alterar_produto', $dados);
        $this->load->view('administracao/footer');
        $this->load->view('administracao/html_footer');
    }
    
    public function salvar_alteracoes() {
        $id = $this->input->post('id');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt_codigo', 'Código do produto', 'required|exact_length[7]|alpha_numeric');
        $this->form_validation->set_rules('txt_titulo', 'Nome do produto', 'required|min_length[3]');
        $this->form_validation->set_rules('txt_preco', 'Preço', 'required');
        $this->form_validation->set_rules('txt_largura_caixa_mm', 'Largura da caixa', 'required');
        $this->form_validation->set_rules('txt_altura_caixa_mm', 'Altura da caixa', 'required');
        $this->form_validation->set_rules('txt_comprimento_caixa_mm', 'Comprimento da caixa', 'required');
        $this->form_validation->set_rules('txt_peso_gramas', 'Peso', 'required');
        $this->form_validation->set_rules('txt_descricao', 'Descrição', 'required|min_length[20]');
        if ($this->form_validation->run() == FALSE) {
            $this->alterar($id);
        } else {
            $id = $this->input->post('id');
            $dados['codigo'] = $this->input->post('txt_codigo');
            $dados['titulo'] = $this->input->post('txt_titulo');
            $dados['preco'] = $this->input->post('txt_preco');
            $dados['largura_caixa_mm'] = $this->input->post('txt_largura_caixa_mm');
            $dados['altura_caixa_mm'] = $this->input->post('txt_altura_caixa_mm');
            $dados['comprimento_caixa_mm'] = $this->input->post('txt_comprimento_caixa_mm');
            $dados['peso_gramas'] = $this->input->post('txt_peso_gramas');
            $dados['descricao'] = $this->input->post('txt_descricao');
            if ($this->modelprodutos->salvar_alteracoes($id, $dados)) {
                redirect(base_url('administracao/produtos/alterar/' . $id));
            } else {
                echo "Houve um erro ao alterar o produto.";
            }
        }
    }
    
    public function nova_foto() {
        $id = $this->input->post('id');
        $config['upload_path'] = './assets/img/produtos';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['file_name'] = $id . ".jpg";
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            echo $this->upload->display_errors();
        } else {
            $config2['source_image'] = './assets/img/produtos/'. $id . '.jpg';
            $config2['create_thumb'] = FALSE;
            $config2['width']        = 400;
            $config2['heigth']       = 400;
            $this->load->library('image_lib', $config2);
            if ($this->image_lib->resize()) {
                redirect(base_url('administracao/produtos/alterar/' . $id));
            } else {
                echo $this->image_lib->display_errors();
            }
        }
    }
}




















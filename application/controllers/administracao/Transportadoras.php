<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transportadoras extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('usuarios_model', 'modelusuarios');
        $this->modelusuarios->validar($this->router->class, $this->router->method);
        
        $this->load->model('transportadoras_model', 'modeltransportadoras');
        $this->load->library('table');
    }
    
    public function index() {
        $dados['faixas_fretes'] = $this->modeltransportadoras->tabela_fretes();
        $this->load->view('administracao/html_header');
        $this->load->view('administracao/header');
        $this->load->view('administracao/transportadoras', $dados);
        $this->load->view('administracao/footer');
        $this->load->view('administracao/html_footer');
    }
    
    public function adicionar() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('peso_de', 'Peso de', 'required');
        $this->form_validation->set_rules('peso_ate', 'Peso ate', 'required');
        $this->form_validation->set_rules('preco', 'Preço', 'required');
        $this->form_validation->set_rules('adicional_kg', 'Adicional Kg', 'required');
        $this->form_validation->set_rules('uf', 'Uf', 'required|exact_length[2]');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $dados['peso_de'] = $this->input->post('peso_de');
            $dados['peso_ate'] = $this->input->post('peso_ate');
            $dados['preco'] = $this->input->post('preco');
            $dados['adicional_kg'] = $this->input->post('adicional_kg');
            $dados['uf'] = $this->input->post('uf');
            if ($this->modeltransportadoras->adicionar($dados)) {
                redirect(base_url('administracao/transportadoras'));
            } else {
                echo "Houve algum erro ao adicioar os dados na tabela de Preço da Tranportadora";
            }
        }
    }
    
    public function excluir($id) {
        if ($this->modeltransportadoras->excluir($id)) {
            redirect(base_url('administracao/transportadoras'));
        } else {
            echo "Houve algum erro ao excluir os dados na tabela de Preço da Tranportadora";
        }
    }
}
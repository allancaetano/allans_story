<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('usuarios_model', 'modelusuarios');
        $this->modelusuarios->validar($this->router->class, $this->router->method);
        
        $this->load->model('clientes_model', 'modelclientes');
    }
    
    public function index() {
        $this->load->library('table');
        $dados['clientes'] = $this->modelclientes->listar($this->input->post('filtro'));
        $this->load->view('administracao/html_header');
        $this->load->view('administracao/header');
        $this->load->view('administracao/clientes', $dados);
        $this->load->view('administracao/footer');
        $this->load->view('administracao/html_footer');
    }
    
    public function excluir($id) {
        if ($this->modelclientes->excluir($id)) {
            redirect(base_url('administracao/clientes'));
        } else {
            echo "Houve um erro ao excluir o cliente";
        }
    }
    
    public function alterar($id) {
        $data['cliente'] = $this->modelclientes->alterar($id);
        $this->load->view('administracao/html_header');
        $this->load->view('administracao/header');
        $this->load->view('administracao/alterar_cliente', $data);
        $this->load->view('administracao/footer');
        $this->load->view('administracao/html_footer');
    }
    
    public function salvar_alteracoes($id) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome', 'Nome', 'required|min_length[3]');
        $this->form_validation->set_rules('sobrenome', 'Sobrenome', 'required|min_length[3]');
        $this->form_validation->set_rules('sexo', 'Sexo', 'max_length[1]');
        $this->form_validation->set_rules('cpf', 'CPF', 'required|min_length[14]');
        $this->form_validation->set_rules('cep', 'CEP', 'required|min_length[9]');
        $this->form_validation->set_rules('numero', 'Número', 'required|max_length[6]');
        $this->form_validation->set_rules('telefone', 'Telefone', 'required|min_length[9]');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[6]');
         if ($this->form_validation->run() == FALSE) {
             $this->alterar($id);
        } else {
            $dados['nome'] = $this->input->post('nome');
            $dados['sobrenome'] = $this->input->post('sobrenome');
            $dados['rg'] = $this->input->post('rg');
            $dados['cpf'] = $this->input->post('cpf');
            $dados['data_nascimento'] = dataBr_to_dataMySQL($this->input->post('data_nascimento'));
            $dados['sexo'] = $this->input->post('sexo');
            $dados['cep'] = $this->input->post('cep');
            $dados['rua'] = $this->input->post('rua');
            $dados['bairro'] = $this->input->post('bairro');   
            $dados['cidade'] = $this->input->post('cidade');
            $dados['estado'] = $this->input->post('estado');
            $dados['numero'] = $this->input->post('numero');
            $dados['telefone'] = $this->input->post('telefone');
            $dados['celular'] = $this->input->post('celular');
            $dados['email'] = $this->input->post('email');
            $dados['senha'] = $this->input->post('senha');
            if ($this->modelclientes->salvar_alteracoes($id, $dados)) {
                $this->alterar($id);
            } else {
                echo "Houve um erro ao alterar as informações do cliente";
            }
        }
    }
}
 












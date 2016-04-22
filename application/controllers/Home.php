<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    private $categorias;
    
    function __construct() {
        parent::__construct();
        $this->load->model('categorias_model', 'modelcategorias');
        $this->categorias = $this->modelcategorias->listar_categorias();
    }
    
    public function index() {
        $this->load->helper('text');
        $this->load->model('produtos_model', 'modelprodutos');
        $data_header['categorias'] = $this->categorias;
        $data_pagina['destaques'] = $this->modelprodutos->destaques_home();
        $this->load->view('html-header');
        $this->load->view('header', $data_header);
        $this->load->view('home', $data_pagina);
        $this->load->view('footer');
        $this->load->view('html-footer');
    }
    
    public function buscar() {
        $this->load->helper('text');
        $this->load->model('produtos_model', 'modelprodutos');
        $data_header['categorias'] = $this->categorias;
        $busca = $this->input->post('txt_busca');
        $data_pagina['termo'] = $busca;
        $data_pagina['destaques'] = $this->modelprodutos->busca($busca);
        $this->load->view('html-header');
        $this->load->view('header', $data_header);
        $this->load->view('busca', $data_pagina);
        $this->load->view('footer');
        $this->load->view('html-footer');
    }
    
    public function fale_conosco() {
        $data_header['categorias'] = $this->categorias;
        $this->load->view('html-header');
        $this->load->view('header', $data_header);
        $this->load->view('fale_conosco');
        $this->load->view('footer');
        $this->load->view('html-footer');
    }
    
    public function enviar_mensagem() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt_nome', 'Nome', 'required|min_length[3]');
        $this->form_validation->set_rules('txt_email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('txt_assunto', 'Assunto', 'required|min_length[5]');
        $this->form_validation->set_rules('txt_msg', 'Mensagem', 'required|min_length[20]');
        if ($this->form_validation->run() == FALSE) {
            $this->fale_conosco();
        } else {
            $dados['nome'] = $this->input->post('txt_nome');
            $dados['email'] = $this->input->post('txt_email');
            $dados['assunto'] = $this->input->post('txt_assunto');
            $dados['msg'] = $this->input->post('txt_msg');
            $mensagem = $this->load->view('emails/envio_mensagem.php', $dados, TRUE);
            $this->load->library('my_phpmailer');
            $obj_email = new PHPMailer();
            $obj_email->isSMTP();              
            $obj_email->Host = "smtp.gmail.com";
            $obj_email->Port = 587;
            $obj_email->SMTPSecure = 'tls';
            $obj_email->SMTPAuth = TRUE;
            $obj_email->Username = "#########@gmail.com";
            $obj_email->Password = "#############";
            $obj_email->setFrom("##########@gmail.com", "Atendimento ao Cliente");
            $obj_email->addAddress("############@gmail.com");
            $obj_email->CharSet = "utf-8";
            $obj_email->Subject = $this->input->post('txt_assunto');
            $obj_email->msgHTML($mensagem);
            if ($obj_email->send()) {
                $data_header['categorias'] = $this->categorias;
                $this->load->view('html-header');
                $this->load->view('header', $data_header);
                $this->load->view('confirmacao_envio_mensagem');
                $this->load->view('footer');
                $this->load->view('html-footer');
            } else {
                echo "Houve algum erro ao tentar enviar o e-mail";
            }
        }
    }
}


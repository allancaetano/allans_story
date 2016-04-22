<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Idioma {
    
    private $codeigniter;
    private $idioma_padrao;
    
    public function __construct() {
        $this->codeigniter = &get_instance();
    }
    
    function get_idioma() {
        if ($this->codeigniter->session->userdata('idioma')) {
            return $this->codeigniter->session->userdata('idioma');
        } else {
            return $this->idioma_padrao;
        }
    }
}


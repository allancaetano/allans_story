<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transportadoras_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    // Método Ortoxodo - Não obedece as boas praticas de Programação - CUIDADO
    public function tabela_fretes() {
        $this->db->select("concat('<a href=./transportadoras/excluir/',id,'>',id,'</a>') AS Excluir");
        $this->db->select("peso_de AS 'De Kg', peso_ate AS 'Ate Kg', preco AS R$, adicional_kg AS 'R$ por Kg Adicional', uf AS 'Estado'");
        return $this->db->get('tb_transporte_preco');
    }
    
    public function adicionar($dados) {
        return $this->db->insert('tb_transporte_preco', $dados);
    }

    public function excluir($id) {
        $this->db->where('id', $id);
        return $this->db->delete('tb_transporte_preco');
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function listar($filtro = NULL) {
        $this->db->select("(SELECT count(*) FROM pedidos WHERE cliente = (clientes.id)) AS numero_pedidos, clientes.*");
        $this->db->from('clientes');
        $this->db->join('pedidos', 'pedidos.cliente = clientes.id', 'left');
        if ($filtro == 'novos') {
            $this->db->where('clientes.status', 0);
        } else if ($filtro == 'pedidos-abertos') {
            $this->db->where('pedidos.status', 0);
        }
        $this->db->group_by('clientes.id');
        return $this->db->get()->result();
    }
    
    public function excluir($id) {
        $this->db->where('md5(id)', $id);
        return $this->db->delete('clientes');
    }
    
    public function alterar($id) {
        $this->db->where('md5(id)', $id);
        return $this->db->get('clientes')->result();
    }
    
    public function salvar_alteracoes($id ,$dados) {
        $this->db->query("INSERT INTO clientes_log SELECT * FROM clientes WHERE md5(id) = '" . $id . "'");
        $this->db->where('md5(id)', $id);
        return $this->db->update('clientes', $dados);
    }
}
    
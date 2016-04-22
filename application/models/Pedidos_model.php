<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function contar() {
        return $this->db->count_all('pedidos');
    }
    
    public function estatisticas() {
        $consulta = "SELECT count(*) AS quantos FROM pedidos WHERE status = 0"
        . " UNION ALL"
        . " SELECT count(*) AS quantos FROM pedidos WHERE status = 1"
        . " UNION ALL"
        . " SELECT count(*) AS quantos FROM pedidos WHERE status = 2";
        $contagem = $this->db->query($consulta)->result();
        $dados['novos'] = $contagem[0]->quantos;
        $dados['pagos'] = $contagem[1]->quantos;
        $dados['enviados'] = $contagem[2]->quantos;
        return $dados;
    }
    
    public function listar($filtro = NULL, $numero_nome = NULL) {
        $this->db->select('clientes.nome, clientes.sobrenome, pedidos.*');
        $this->db->from('pedidos');
        $this->db->join('clientes', 'pedidos.cliente = clientes.id');
        if (isset($filtro) && $filtro != "*") {
            $this->db->where('pedidos.status', $filtro);
        }
        if ($numero_nome) {
            $this->db->where('pedidos.id', $numero_nome);
            $this->db->or_like('clientes.nome', $numero_nome, "both");
            $this->db->or_like('clientes.sobrenome', $numero_nome, "both");
        }
        $this->db->group_by('pedidos.id');
        $this->db->order_by('pedidos.id', 'DESC');
        return $this->db->get()->result();
    }
    
    public function detalhes($pedido) {
        $this->db->where('md5(id)', $pedido);
        $dados['detalhes'] = $this->db->get('pedidos')->result();
        
        $this->db->where('id', $dados['detalhes'][0]->cliente);
        $dados['cliente'] = $this->db->get('clientes')->result();
        
        $this->db->select('produtos.id as id_produto, produtos.titulo, itens_pedidos.*');
        $this->db->from('itens_pedidos');
        $this->db->join('produtos', 'produtos.codigo = itens_pedidos.item');
        $this->db->where('itens_pedidos.pedido', $dados['detalhes'][0]->id);
        $this->db->group_by('itens_pedidos.item');
        $this->db->order_by('produtos.titulo', 'ASC');
        $dados['itens'] = $this->db->get()->result();
        return $dados;
    }
    
    public function alterar_status($id, $status, $comentarios) {
        $dados['status'] = $status;
        $dados['comentarios'] = $comentarios;
        $this->db->where('id', $id);
        return $this->db->update('pedidos', $dados);
    }
    
    public function excluir($id) {
        $this->db->where('md5(id)', $id);
        return $this->db->delete('pedidos');
    }
} 
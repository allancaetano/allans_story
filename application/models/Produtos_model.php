<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function detalhes_produto($id) {
        $this->db->where('id', $id);
        return $this->db->get('produtos')->result();
    }
    
    // Conflito de criptografia resolvido ...
    public function detalhes_produto_md5($id) {
        $this->db->or_where('md5(id)', $id);
        return $this->db->get('produtos')->result();
    }

    public function destaques_home($quantos = 3) {
        $this->db->limit($quantos);
        $this->db->order_by('id', 'random');
        return $this->db->get('produtos')->result();
    }
    
    public function busca($buscar) {
        $this->db->like('titulo', $buscar);
        $this->db->or_like('descricao', $buscar);
        return $this->db->get('produtos')->result();
    }
    
    public function contar() {
        return $this->db->count_all('produtos');
    }
    
    public function listar($pular = NULL, $produtos_por_pagina = NULL) {
        $this->db->select('categorias.titulo AS categoria, produtos.id, produtos.codigo, produtos.titulo, produtos.preco, produtos.ativo');
        $this->db->from('produtos');
        $this->db->join('produtos_categorias', 'produtos_categorias.produto = produtos.id', 'left');
        $this->db->join('categorias', 'categorias.id = produtos_categorias.categoria', 'left');
        $this->db->group_by('produtos.id');
        $this->db->order_by('categorias.id', 'ASC');
        if ($pular && $produtos_por_pagina) {
            $this->db->limit($produtos_por_pagina, $pular);
        } else {
            $this->db->limit(5);
        }
        return $this->db->get()->result();
    }
    
    public function adicionar($dados) {
        return $this->db->insert('produtos', $dados);
    }


    public function excluir($id) {
        $this->db->where('md5(id)', $id);
        return $this->db->delete('produtos');
    }
    
    public function salvar_alteracoes($id, $dados) {
        $this->db->where('md5(id)', $id);
        return $this->db->update('produtos', $dados);
    }
}




























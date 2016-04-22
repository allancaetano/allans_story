<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Administrar Clientes</h1>
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Listar Clientes</h3>
                        <?php
                        echo form_open(base_url('administracao/clientes'));
                            $filtro = array('todos' => 'Todos', 'novos' => 'Novos', 'pedidos-abertos' => 'Com pedidos em aberto');
                            echo form_dropdown('filtro', $filtro, 'todos', array('class' => 'form-control')) . br();
                            echo form_submit(array('name' => 'buscar', 'value' => 'Filtrar', 'class' => 'btn btn-primary'));   
                        echo form_close();
                        ?>
                    </div>
                    <div class="panel-body">
                        <?php 
                        $txt_status = array("Novo", "Ativo");
                        $this->table->set_heading("Excluir", "Alterar", "Nome do Cliente", "Status", "Pedidos");
                        foreach ($clientes as $cliente) {
                            $excluir = anchor(base_url("administracao/clientes/excluir/" . md5($cliente->id)), "Excluir", array('onclick' => "return confirm('Confirmar exclusão do cliente?')"));
                            $alterar = anchor(base_url("administracao/clientes/alterar/" . md5($cliente->id)), "Alterar");
                            $detalhes = "<b>" . strtoupper($cliente->nome) . " " . strtoupper($cliente->sobrenome) . "</b>";
                            $status = $txt_status[$cliente->status];
                            $pedidos = $cliente->numero_pedidos;
                            $this->table->add_row($excluir, $alterar, $detalhes, $status, $pedidos);
                        }
                        $this->table->set_template(array('table_open' => '<table class="table table-striped miniaturas">'));
                        echo $this->table->generate();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



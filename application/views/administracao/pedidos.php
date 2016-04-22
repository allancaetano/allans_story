<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $total ?> Pedidos cadastrados</h1>
            </div>
            <div class="col-lg-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php
                        echo form_open(base_url('administracao/pedidos'));
                            $filtro = array("*" => 'Todos', '0' => 'Novos', '1' => 'Pagos', '2' => 'Enviados');
                            echo form_label("Filtrar por tipo&nbsp;", "filtro") . 
                            form_dropdown('filtro', $filtro, "*", array('class' => 'form-control')) . br() .
                            form_label("Número do pedido ou nome do cliente&nbsp;", "numero_nome") .
                            form_input(array('id' => 'numero_nome', 'name' => 'numero_nome', 'class' => 'form-control')) . br() .
                            form_submit(array('id' => 'filtrar', 'name' => 'filtrar', 'value' => 'Filtrar', 'class' => 'btn btn-primary')) .
                        form_close();
                        ?>
                    </div>
                    <div class="panel-body">
                        <?php 
                        $txt_status = array(0 => "Novo", 1 => "Pagamento Confirmado", 2 => "Enviado");
                        $this->table->set_heading("Excluir", "Detalhes", "Data", "Número", "Status", "Cliente", "Produtos", "Frete");
                        foreach ($pedidos as $pedido) {
                            $excluir = anchor(base_url('administracao/pedidos/excluir/' . md5($pedido->id)), "Excluir", array('onclick' => "return confirm('Confirmar exclusão do pedido?')"));
                            //$alterar = anchor(base_url('administracao/pedidos/alterar/' . md5($pedido->id)), "Alterar");
                            $detalhes = anchor(base_url('administracao/pedidos/detalhes/' . md5($pedido->id)), "Detalhes");
                            $nome = $pedido->nome . " " . $pedido->sobrenome;
                            $status = $txt_status[$pedido->status];
                            $data = dataMySQL_to_dataBr($pedido->data);
                            $produtos = reais($pedido->produtos);
                            $frete = reais($pedido->frete);
                            $this->table->add_row($excluir, $detalhes, $data, $pedido->id, $status, $nome, $produtos, $frete);
                        }
                        $this->table->set_template(array('table_open' => '<table class="table table-striped">'));
                        echo $this->table->generate();
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="flot-chart">
                            <div class="flot-chart-content" id="flot-pie-chart" style="padding: 0px; width: 80%; position: absolute">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var dados = [<?php foreach ($grafico as $legenda => $valor) {
            echo "{label:' " . ucfirst($legenda) . "-" . $valor . "', data:" . $valor . "},";
        }?>];
        $.plot($("#flot-pie-chart"), dados, {series:{pie:{show:true}}, tooltip:false});
    });
</script>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Tabela de Frete</h1>
            </div>
            <div class="col-lg-3">
                <?php echo validation_errors(); ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <b style="font-size: 18px">Adicionar faixa de preço</b>
                    </div>
                    <div class="panel-body">
                        <?php
                        // Método Ortoxodo - Não obedece as boas praticas de Programação - CUIDADO
                        echo form_open('administracao/transportadoras/adicionar');
                            $campos = $this->db->list_fields('tb_transporte_preco');
                            foreach ($campos as $campo) {
                                if ($campo != 'id') {
                                    echo form_label(ucfirst(str_replace("_", " ", ($campo))), $campo);
                                    echo form_input(array('name' => $campo, 'id' => $campo, 'value' => set_value($campo), 'class' => 'form-control')) .  br();
                                }
                            }
                            echo form_submit(array('name' => 'adicionar', 'value' => 'Adicionar', 'class' => 'btn btn-primary')) .
                        form_close();
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <b style="font-size: 18px">Faixas de preço por Kg cadastradas</b>
                    </div>
                    <div class="panel-body">
                        <?php
                        // Método Ortoxodo - Não obedece as boas praticas de Programação - CUIDADO
                        $this->table->set_template(array('table_open' => '<table class="table table-bordered">'));
                        echo $this->table->generate($faixas_fretes);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


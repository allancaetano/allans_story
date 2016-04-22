<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Administrar Usuários</h1>
            </div>
            <div class="col-lg-5">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <b style="font-size: 18px">Adicionar novo usuário</b>
                    </div>
                    <div class="panel-body">
                        <?php
                        echo validation_errors();
                        echo form_open('administracao/usuarios/adicionar') .
                            form_label("Login", "login") .
                            form_input(array('id' => 'login', 'name' => 'login', 'value' => set_value('login'), 'class' => 'form-control')) . br() .
                            form_label("Senha", "senha") .
                            form_input(array('id' => 'senha', 'name' => 'senha', 'value' => set_value('senha'), 'class' => 'form-control')) . br() .
                            form_submit(array('value' => 'Adicionar novo usuário', 'class' => 'btn btn-primary')) .
                        form_close();
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <b style="font-size: 18px">Alterar usuários existentes</b>
                    </div>
                    <div class="panel-body">
                        <?php
                        $this->table->set_heading("Excluir", "Alterar", "Permissões", "Usuário");
                        foreach ($usuarios as $usuario) {
                            $excluir = anchor(base_url("administracao/usuarios/excluir/" . $usuario->id), "Excluir", array('onclick' => "return confirm('Confirmar exclusão do usuário?')"));
                            $alterar = anchor(base_url("administracao/usuarios/alterar/" . $usuario->id), "Alterar");
                            $permissoes = anchor(base_url("administracao/usuarios/permissoes/" . $usuario->id), "Permissões");
                            $this->table->add_row($excluir, $alterar, $permissoes, $usuario->login);
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





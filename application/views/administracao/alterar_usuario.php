<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Administrar Usuários</h1>
            </div>
            <div class="col-lg-5">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <b>Alterar usuário</b>
                    </div>
                    <div class="panel-body">
                        <?php
                        echo validation_errors();
                        echo form_open('administracao/usuarios/salvar_alteracoes') .
                            form_hidden('id', $usuario[0]->id) .
                            form_label("Login", "login") .
                            form_input(array('id' => 'login', 'name' => 'login', 'value' => $usuario[0]->login, 'class' => 'form-control')) . br() .
                            form_label("Senha", "senha") .
                            form_input(array('id' => 'senha', 'name' => 'senha', 'value' => $usuario[0]->senha, 'class' => 'form-control')) . br() .
                            form_submit(array('value' => 'Salvar Alteraçoes', 'class' => 'btn btn-primary')) .
                        form_close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
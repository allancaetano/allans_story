<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <b style="text-align: center">Efetuar Login</b>
                </div>
                <div class="panel-body">
                    <?php
                    echo form_open(base_url('administracao/usuarios/efetuar_login')) .
                        "<fieldset>" .
                            "<div class='form-group'>" .
                                form_input(array('name' => 'usuario', 'type' => 'text', 'placeholder' => 'Usuário', 'class' => 'form-control')) .
                            "</div>" .
                            "<div class='form-group'>" .
                                form_input(array('name' => 'senha', 'type' => 'password', 'placeholder' => 'Senha', 'class' => 'form-control')) .
                            "</div>" .
                            form_input(array('type' => 'submit', 'value' => 'Login', 'class' => 'btn btn-lg btn-success btn-block')) .
                        "</fieldset>" .
                    form_close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

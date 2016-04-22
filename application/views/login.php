<div id="homebody">
    <div class="alinhado-centro borda-base espaco-vertical">
        <h3>Efetuar login</h3>
        <p>Informe os dados de usúario e senha para fazer login no Website</p>
    </div>
    <div class="row-fluid alinhado-centro">
        <?php
        echo form_open(base_url('cadastro/login'), array('id' => 'form_login', 'name' => 'form_login')) .
            "<div class='control-group error'>" . 
                "<span class='help-block'>" . form_error('email') . "</span>" .  
            "</div>" .
            form_input(array('id' => 'email', 'name' => 'email', 'Placeholder' => 'E-mail', 'value' => set_value('email'))) .
            "<div class='control-group error'>" . 
                "<span class='help-block'>" . form_error('senha') . "</span>" .  
            "</div>" .
            form_password(array('id' => 'senha', 'name' => 'senha', 'Placeholder' => 'Senha')) . br() .
            form_submit(array('name' => 'btn_cadastrar', 'value' => 'Efetuar Login', 'class' => 'btn btn-success')) .
        form_close() .
        anchor(base_url('esqueci-minha-senha'), "Esqueci minha senha");
        ?>
    </div>
</div>


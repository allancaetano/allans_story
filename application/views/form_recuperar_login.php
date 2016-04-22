<div id="homebody">
    <div class="alinhado-centro borda-base espaco-vertical">
        <h3>Recuperar login</h3>
        <p>
            Informe o e-mail e o CPF cadastrados para recuperar os dados de login.<br>
            Obs. Somente é possível receber dados de login de cadastros ativos.
        </p>
    </div>
    <div class="row-fluid alinhado-centro">
        <?php
        echo validation_errors() . br();
        echo form_open(base_url('cadastro/recuperar_login'), array('id' => 'form_recuperar_login', 'name' => 'form_login')) .
            form_input(array('id' => 'email', 'name' => 'email', 'Placeholder' => 'E-mail', 'value' => set_value('email'))) .
            form_input(array('id' => 'cpf', 'name' => 'cpf', 'Placeholder' => 'CPF')) . br(2) .
            form_submit(array('name' => 'btnLogin', 'value' => 'Recuperar Login', 'class' => 'btn btn-success')) .
        form_close() . 
        anchor(base_url('login'), "Efetuar Login");
        ?>
    </div>
</div>

<script>
jQuery(function($){
    $("#cpf").mask("999.999.999-99");
});
</script>

<div id="homebody">
    <div class="alinhado-centro borda-base espaco-vertical">
        <h3>Seja bem-vindo a nossa loja</h3>
        <p>Use o formulario abaixo para se cadastrar.</p>
    </div>
    <div class="row-fluid">
        <?php
        echo form_open(base_url('cadastro/adicionar'), array('id' => 'form_cadastro')) .
            "<div class='span4'>" .
                "<div class='control-group error'>" . 
                    "<span class='help-block'>" . form_error('nome') . "</span>" .  
                "</div>" .
                form_input(array('id' => 'nome', 'name' => 'nome', 'Placeholder' => 'Nome', 'value' => set_value('nome'), 'data-bv-field' => 'nome')) .
                
                "<div class='control-group error'>" . 
                    "<span class='help-block'>" . form_error('sobrenome') . "</span>" .  
                "</div>" .
                form_input(array('id' => 'sobrenome', 'name' => 'sobrenome', 'Placeholder' => 'Sobrenome', 'value' => set_value('sobrenome'))) .
                
                "<div class='control-group error'>" . 
                    "<span class='help-block'>" . form_error('rg') . "</span>" .  
                "</div>" .
                form_input(array('id' => 'rg', 'name' => 'rg', 'Placeholder' => 'RG', 'value' => set_value('rg'))) .
                
                "<div class='control-group error'>" . 
                    "<span class='help-block'>" . form_error('cpf') . "</span>" .  
                "</div>" .
                form_input(array('id' => 'cpf', 'name' => 'cpf', 'Placeholder' => 'CPF', 'value' => set_value('cpf'))) .
                
                form_input(array('id' => 'data_nascimento', 'name' => 'data_nascimento', 'Placeholder' => 'Data de Nascimento', 'value' => set_value('data_nascimento'))) .
                
                "<div class='control-group error'>" . 
                    "<span class='help-block'>" . form_error('sexo') . "</span>" .  
                "</div>" .
                form_input(array('id' => 'sexo', 'name' => 'sexo', 'Placeholder' => 'Sexo (M/F)', 'value' => set_value('sexo'))) .
            "</div>";
            echo "<div class='span4'>" .
                "<div class='control-group error'>" . 
                    "<span class='help-block'>" . form_error('cep') . "</span>" .  
                "</div>" .
                form_input(array('id' => 'cep', 'name' => 'cep', 'Placeholder' => 'CEP', 'value' => set_value('cep'))) .
                form_input(array('id' => 'rua', 'name' => 'rua', 'Placeholder' => 'Rua', 'value' => set_value('rua'), 'readonly' => 'true')) .
                form_input(array('id' => 'bairro', 'name' => 'bairro', 'Placeholder' => 'Bairro', 'value' => set_value('bairro'), 'readonly' => 'true')) .
                form_input(array('id' => 'cidade', 'name' => 'cidade', 'Placeholder' => 'Cidade', 'value' => set_value('cidade'), 'readonly' => 'true')) .
                form_input(array('id' => 'estado', 'name' => 'estado', 'Placeholder' => 'Estado', 'value' => set_value('estado'), 'readonly' => 'true')) .
                    
                "<div class='control-group error'>" . 
                    "<span class='help-block'>" . form_error('numero') . "</span>" .  
                "</div>" .
                form_input(array('id' => 'numero', 'name' => 'numero', 'Placeholder' => 'Número', 'value' => set_value('numero'))) .
            "</div>";
            echo "<div class='span4'>" .     
                "<div class='control-group error'>" . 
                    "<span class='help-block'>" . form_error('telefone') . "</span>" .  
                "</div>" .
                form_input(array('id' => 'telefone', 'name' => 'telefone', 'Placeholder' => 'Telefone', 'value' => set_value('telefone'))) .
                form_input(array('id' => 'celular', 'name' => 'celular', 'Placeholder' => 'Celular', 'value' => set_value('celular'))) .
                "<div class='control-group error'>" . 
                    "<span class='help-block'>" . form_error('email') . "</span>" .  
                "</div>" .
                form_input(array('id' => 'email', 'name' => 'email', 'Placeholder' => 'E-mail', 'value' => set_value('email'))) .
                    
                "<div class='control-group error'>" . 
                    "<span class='help-block'>" . form_error('senha') . "</span>" .  
                "</div>" .
                form_password(array('id' => 'senha', 'name' => 'senha', 'Placeholder' => 'Senha', 'value' => set_value('senha'))) . br() .
                    
                "<div class='control-group error'>" . 
                    "<span class='help-block'>" . form_error('confirma_senha') . "</span>" .  
                "</div>" .
                form_password(array('id' => 'confirma_senha', 'name' => 'confirma_senha', 'Placeholder' => 'Confirmar senha', 'value' => set_value('confirma_senha'))) . br() .
                form_submit(array('name' => 'btn_cadastrar', 'value' => 'Cadastrar', 'class' => 'btn btn-success')) .
            "</div>" .
        form_close();
        ?>
    </div>
</div>

<script type="text/javascript">
$("#cep").blur(function() {
    $.getJSON("https://viacep.com.br/ws/" + $("#cep").val() + "/json", function(dados) {
        if(!("erro" in dados)) {
            $("#rua").val(dados.logradouro);
            $("#bairro").val(dados.bairro);
            $("#cidade").val(dados.localidade);
            $("#estado").val(dados.uf);
            $("#numero").focus();
        } else {
            alert("CEP não encontrado.");
        }
    });
});

jQuery(function($){
        $("#cpf").mask("999.999.999-99");
        $("#rg").mask("99.999.999-9");
        $("#cep").mask("99999-999");
        $("#data_nascimento").mask("99/99/9999");
        $("#telefone").mask("(99) 9999-9999");
        $("#celular").mask("(99) 99999-9999");
});
</script>
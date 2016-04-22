<div id="homebody">
    <div class="alinhado-centro borda-base espaco-vertical">
        <h3>Alteração de cadastro</h3>
        <p>Use o formulario abaixo para alterar seu cadastro.</p>
    </div>
    <div class="row-fluid">
        <?php
        echo form_open(base_url('cadastro/salvar_alteracao_cadastro'), array('id' => 'form_cadastro')) .
            "<div class='span4'>" .
                form_hidden('id', md5($cliente[0]->id)) .
                
                "<div class='control-group error'>" . 
                    "<span class='help-block'>" . form_error('nome') . "</span>" .  
                "</div>" .
                form_input(array('id' => 'nome', 'name' => 'nome', 'Placeholder' => 'Nome', 'value' => $cliente[0]->nome)) .
                
                "<div class='control-group error'>" . 
                    "<span class='help-block'>" . form_error('sobrenome') . "</span>" .  
                "</div>" .
                form_input(array('id' => 'sobrenome', 'name' => 'sobrenome', 'Placeholder' => 'Sobrenome', 'value' => $cliente[0]->sobrenome)) .
                form_input(array('id' => 'rg', 'name' => 'rg', 'Placeholder' => 'RG', 'value' => $cliente[0]->rg)) .
                
                "<div class='control-group error'>" . 
                    "<span class='help-block'>" . form_error('cpf') . "</span>" .  
                "</div>" .
                form_input(array('id' => 'cpf', 'name' => 'cpf', 'Placeholder' => 'CPF', 'value' => $cliente[0]->cpf)) .
                form_input(array('id' => 'data_nascimento', 'name' => 'data_nascimento', 'Placeholder' => 'Data de Nascimento', 'value' => dataMySQL_to_dataBr($cliente[0]->data_nascimento))) .
                
                "<div class='control-group error'>" . 
                    "<span class='help-block'>" . form_error('sexo') . "</span>" .  
                "</div>" .
                form_input(array('id' => 'sexo', 'name' => 'sexo', 'Placeholder' => 'Sexo (M/F)', 'value' => $cliente[0]->sexo)) .
            "</div>";
            echo "<div class='span4'>" .
                    
                "<div class='control-group error'>" . 
                    "<span class='help-block'>" . form_error('cep') . "</span>" .  
                "</div>" .
                form_input(array('id' => 'cep', 'name' => 'cep', 'Placeholder' => 'CEP', 'value' => $cliente[0]->cep)) .
                form_input(array('id' => 'rua', 'name' => 'rua', 'Placeholder' => 'Rua', 'value' => $cliente[0]->rua, 'readonly' => 'true')) .
                form_input(array('id' => 'bairro', 'name' => 'bairro', 'Placeholder' => 'Bairro', 'value' => $cliente[0]->bairro, 'readonly' => 'true')) .
                form_input(array('id' => 'cidade', 'name' => 'cidade', 'Placeholder' => 'Cidade', 'value' => $cliente[0]->cidade, 'readonly' => 'true')) .
                form_input(array('id' => 'estado', 'name' => 'estado', 'Placeholder' => 'Estado', 'value' => $cliente[0]->estado, 'readonly' => 'true')) .
                    
                "<div class='control-group error'>" . 
                    "<span class='help-block'>" . form_error('numero') . "</span>" .  
                "</div>" .
                form_input(array('id' => 'numero', 'name' => 'numero', 'Placeholder' => 'Número', 'value' => $cliente[0]->numero)) .
            "</div>";
            echo "<div class='span4'>" .
                    
                "<div class='control-group error'>" . 
                    "<span class='help-block'>" . form_error('telefone') . "</span>" .  
                "</div>" .
                form_input(array('id' => 'telefone', 'name' => 'telefone', 'Placeholder' => 'Telefone', 'value' => $cliente[0]->telefone)) .
                form_input(array('id' => 'celular', 'name' => 'celular', 'Placeholder' => 'Celular', 'value' => $cliente[0]->celular)) .
                    
                "<div class='control-group error'>" . 
                    "<span class='help-block'>" . form_error('email') . "</span>" .  
                "</div>" .
                form_input(array('id' => 'email', 'name' => 'email', 'Placeholder' => 'E-mail', 'value' => $cliente[0]->email)) .
                    
                "<div class='control-group error'>" . 
                    "<span class='help-block'>" . form_error('senha') . "</span>" .  
                "</div>" .
                form_input(array('id' => 'senha', 'name' => 'senha', 'Placeholder' => 'Senha', 'value' => $cliente[0]->senha)) . br(2) .
                form_submit(array('name' => 'btn_cadastrar', 'value' => 'Salvar alterações', 'class' => 'btn btn-success')) .
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
</script>

<script type="text/javascript">
    jQuery(function($){
            $("#cpf").mask("999.999.999-99");
            $("#rg").mask("99.999.999-9");
            $("#cep").mask("99999-999");
            $("#data_nascimento").mask("99/99/9999");
            $("#telefone").mask("(99) 9999-9999");
            $("#celular").mask("(99) 99999-9999");
    });
</script>
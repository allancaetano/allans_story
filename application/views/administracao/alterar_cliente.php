<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Administrar Clientes</h1>
            </div>
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <?php echo validation_errors(); ?>
                    <div class="panel-heading">
                        <b style="font-size: 18px">Cliente: <?php echo $cliente[0]->nome . " " . $cliente[0]->sobrenome ?></b>
                    </div>
                    <div class="panel-body">
                        <div class="col-lg-4">
                            <?php
                            echo form_open(base_url('administracao/clientes/salvar_alteracoes/' . md5($cliente[0]->id))) .
                                form_hidden('id', md5($cliente[0]->id)) .
                                form_label("Nome", "nome") . br() .
                                form_input(array('id' => 'nome', 'name' => 'nome', 'value' => $cliente[0]->nome, 'class' => 'form-control')) . br() .
                                form_label("Sobrenome", "sobrenome") . br() .
                                form_input(array('id' => 'sobrenome', 'name' => 'sobrenome', 'value' => $cliente[0]->sobrenome, 'class' => 'form-control')) . br() .
                                form_label("RG", "rg") . br() .
                                form_input(array('id' => 'rg', 'name' => 'rg', 'value' => $cliente[0]->rg, 'class' => 'form-control')) . br() .
                                form_label("CPF", "cpf") . br() .
                                form_input(array('id' => 'cpf', 'name' => 'cpf', 'value' => $cliente[0]->cpf, 'class' => 'form-control')) . br() .            
                                form_label("Data de Nascimento", "data_nascimento") . br() .
                                form_input(array('id' => 'data_nascimento', 'name' => 'data_nascimento', 'value' => dataMySQL_to_dataBr($cliente[0]->data_nascimento), 'class' => 'form-control')) . br() .
                                form_label("Sexo", "sexo") . br() .
                                form_input(array('id' => 'sexo', 'name' => 'sexo', 'value' => $cliente[0]->sexo, 'class' => 'form-control')) .                            
                        "</div>" .
                        "<div class='col-lg-4'>" .
                                form_label("CEP", "cep") . br() .
                                form_input(array('id' => 'cep', 'name' => 'cep', 'value' => $cliente[0]->cep, 'class' => 'form-control')) . br() .
                                form_label("Rua", "rua") . br() .
                                form_input(array('id' => 'rua', 'name' => 'rua', 'value' => $cliente[0]->rua, 'class' => 'form-control')) . br() .
                                form_label("Bairro", "bairro") . br() .
                                form_input(array('id' => 'bairro', 'name' => 'bairro', 'value' => $cliente[0]->bairro, 'class' => 'form-control')) . br() .
                                form_label("Cidade", "cidade") . br() .
                                form_input(array('id' => 'cidade', 'name' => 'cidade', 'value' => $cliente[0]->cidade, 'class' => 'form-control')) . br() .            
                                form_label("Estado", "estado") . br() .
                                form_input(array('id' => 'estado', 'name' => 'estado', 'value' => $cliente[0]->estado, 'class' => 'form-control')) . br() .
                                form_label("Número", "numero") . br() .
                                form_input(array('id' => 'numero', 'name' => 'numero', 'value' => $cliente[0]->numero, 'class' => 'form-control')) .
                        "</div>" .
                        "<div class='col-lg-4'>" .
                                form_label("Telefone", "telefone") . br() .
                                form_input(array('id' => 'telefone', 'name' => 'telefone', 'value' => $cliente[0]->telefone, 'class' => 'form-control')) . br() .
                                form_label("Celular", "celular") . br() .
                                form_input(array('id' => 'celular', 'name' => 'celular', 'value' => $cliente[0]->celular, 'class' => 'form-control')) . br() .
                                form_label("E-mail", "email") . br() .
                                form_input(array('id' => 'email', 'name' => 'email', 'value' => $cliente[0]->email, 'class' => 'form-control')) . br() .
                                form_label("Senha", "senha") . br() .
                                form_input(array('id' => 'senha', 'name' => 'senha', 'value' => $cliente[0]->senha, 'class' => 'form-control')) .
                        "</div>" . 
                        "<div class='col-lg-12'>" . br() .
                                form_submit(array('name' => 'btn_alterar', 'value' => 'Salvar alterações', 'class' => 'btn btn-primary')) . br() .
                            form_close(); 
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
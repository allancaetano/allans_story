<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Administrar Usuário</h1>
            </div>
            <div class="col-lg-12">
                <h3>Permissões do usúario</h3>
                <?php
                echo form_open(base_url('administracao/usuarios/alterar_permissoes'));
                    echo form_hidden('usuario', $usuario);
                    echo "<div class='panel panel-primary'>";
                        $classe = NULL;
                        $contador = 0;
                        foreach ($permissoes as $permissao) {
                            if ($permissao->classe != $classe) {
                                echo ($contador > 0) ? "</div>" : NULL;
                                echo "<div class='panel-heading'>" .
                                    ucfirst($permissao->classe) .
                                "</div>";
                                echo "<div class='panel-body'>";
                                    $classe = $permissao->classe;
                                    $contador ++;
                            }
                            $dados = array('name' => 'metodo[]', 'id' => 'metodo[]', 'value' => $permissao->id, 'checked' => ($permissao->usuario != "") ? 'checked' : NULL, 'style' => 'margin: 5px');
                            echo form_checkbox($dados);
                            echo ucfirst(str_replace("_", " ", $permissao->metodo));
                        }
                        echo br(2) . form_submit(array('id' => 'alterar', 'name' => 'alterar', 'value' => 'Alterar Permissões', 'class' => 'btn btn-primary'));
                    echo "</div>";
                echo form_close();
                ?>
            </div> 
        </div>
    </div>
</div>



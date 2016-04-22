<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Administrar Produtos</h1>
            </div>
            <div class="col-lg-5">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <b style="font-size: 18px">Alterar produto: <?php echo $produto[0]->titulo ?></b>
                    </div>
                    <div class="panel-body">
                        <?php
                        echo validation_errors();
                        $cod = array('name' => 'txt_codigo', 'id' => 'txt_codigo', 'value' => $produto[0]->codigo, 'class' => 'form-control');
                        $tit = array('name' => 'txt_titulo', 'id' => 'txt_titulo', 'value' => $produto[0]->titulo, 'class' => 'form-control');
                        $pre = array('name' => 'txt_preco', 'id' => 'txt_preco', 'value' => $produto[0]->preco, 'class' => 'form-control');
                        $lar = array('name' => 'txt_largura_caixa_mm', 'id' => 'txt_largura_caixa_mm', 'value' => $produto[0]->largura_caixa_mm, 'class' => 'form-control');
                        $alt = array('name' => 'txt_altura_caixa_mm', 'id' => 'txt_altura_caixa_mm', 'value' => $produto[0]->altura_caixa_mm, 'class' => 'form-control');
                        $com = array('name' => 'txt_comprimento_caixa_mm', 'id' => 'txt_comprimento_caixa_mm', 'value' => $produto[0]->comprimento_caixa_mm, 'class' => 'form-control');
                        $pes = array('name' => 'txt_peso_gramas', 'id' => 'txt_peso_gramas', 'value' => $produto[0]->peso_gramas, 'class' => 'form-control');
                        $des = array('name' => 'txt_descricao', 'id' => 'txt_descricao', 'value' => $produto[0]->descricao, 'class' => 'form-control');
                        echo form_open("administracao/produtos/salvar_alteracoes") .   
                            form_hidden('id', md5($produto[0]->id)) .
                            form_label('Código', 'txt_codigo') . br() .
                            form_input($cod) . br() .      
                            form_label('Título', 'txt_titulo') . br() .
                            form_input($tit) . br() .
                            form_label('Preço', 'txt_preco') . br() .
                            form_input($pre) . br() .
                            form_label('Largura da caixa (mm)', 'txt_largura_caixa_mm') . br() .
                            form_input($lar) . br() .
                            form_label('Altura da caixa (mm)', 'txt_altura_caixa_mm') . br() .
                            form_input($alt) . br() .
                            form_label('Comprimento da caixa (mm)', 'txt_comprimento_caixa_mm') . br() .
                            form_input($com) . br() .
                            form_label('Peso da caixa (gramas)', 'txt_peso_gramas') . br() .
                            form_input($pes) . br() .
                            form_label('Descrição', 'txt_descricao') . br() .
                            form_textarea($des) . br() .
                            form_submit(array('name' => 'btn_alterar', 'value' => 'Alterar produto', 'class' => 'btn btn-primary')) .
                        form_close();
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                
            </div>
            <div class='col-lg-5 imagem'>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <b style="font-size: 18px">Imagem</b>
                    </div>
                    <div class="panel-body">
                        <?php
                        if (is_file("assets/img/produtos/" . md5($produto[0]->id) . ".jpg")) {
                            echo img("assets/img/produtos/" . md5($produto[0]->id) . ".jpg?i=" . date("dmYhis"));
                        }
                        echo form_open_multipart(base_url('administracao/produtos/nova_foto')) .
                            form_hidden('id', md5($produto[0]->id)) .
                            form_upload("userfile") . br() .
                            form_submit(array('name' => 'btn_adicionar', 'value' => 'Adicionar nova imagem', 'class' => 'btn btn-primary')) . 
                        form_close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




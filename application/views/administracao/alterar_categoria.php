<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Administrar Categorias</h1>
            </div>
            <div class="col-lg-5">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <b style="font-size: 18px">Alterar categoria: <?php echo $categoria[0]->titulo ?></b>
                    </div>
                    <div class="panel-body">
                        <?php
                        echo validation_errors();
                        $tit = array('name' => 'txt_titulo', 'id' => 'txt_titulo', 'value' => $categoria[0]->titulo, 'class' => 'form-control');
                        $des = array('name' => 'txt_descricao', 'id' => 'txt_descricao', 'value' => $categoria[0]->descricao, 'class' => 'form-control');
                        echo form_open("administracao/categorias/salvar_alteracoes") . br() .
                            form_hidden('id', md5($categoria[0]->id)) .
                            form_label('Nome da categoria', 'txt_titulo') . br() .
                            form_input($tit) . br() .
                            form_label('Descrição', 'txt_descricao') . br() .
                            form_textarea($des) . br() .    
                            form_submit(array('name' => 'btn_adicionar', 'value' => 'Alterar categoria', 'class' => 'btn btn-primary')) .
                        form_close();
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                
            </div>
            <div class="col-lg-5 imagem">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <b style="font-size: 18px">Imagem</b>
                    </div>
                    <div class="panel-body">
                        <?php
                        if (is_file("assets/img/categorias/" . md5($categoria[0]->id) . ".jpg")) {
                            echo img("assets/img/categorias/" . md5($categoria[0]->id) . ".jpg?i=". date("dmYhis"));
                        }
                        echo form_open_multipart(base_url('administracao/categorias/nova_foto')) .
                            form_hidden('id', md5($categoria[0]->id)) .
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





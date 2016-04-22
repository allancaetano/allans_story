<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Administrar Categorias</h1>
            </div>
            <div class="col-lg-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <b style="font-size: 18px">Adicionar nova categoria</b>
                    </div>
                    <div class="panel-body">
                        <?php
                        echo validation_errors();
                        $titulo = array('name' => 'txt_titulo', 'id' => 'txt_titulo', 'value' => set_value('txt_titulo'), 'class' => 'form-control');
                        $descricao = array('name' => 'txt_descricao', 'id' => 'txt_descricao',
                        'Placeholder' => 'Caracteristicas da Categoria', 'value' => set_value('txt_descricao'), 'class' => 'form-control');
                        echo form_open("administracao/categorias/adicionar") . br() .
                            form_label('Nome da categoria', 'txt_titulo') . br() .
                            form_input($titulo) . br() .
                            form_label('Descrição', 'txt_descricao') . br() .
                            form_textarea($descricao) . br() .    
                            form_submit(array('name' => 'btn_adicionar', 'value' => 'Adicionar nova categoria', 'class' => 'btn btn-primary')) .
                        form_close();
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <b style="font-size: 18px">Alterar categorias existentes</b>
                    </div>
                    <div class="panel-body">
                        <?php
                        $this->table->set_heading("Imagem", "Excluir", "Alterar", "Nome da Categoria");
                        foreach ($categorias as $categoria) {
                            $imagem = img("assets/img/categorias/categoria-sem-foto.png");
                            if (is_file("assets/img/categorias/" . md5($categoria->id) . ".jpg")) {
                                $imagem = img("assets/img/categorias/" . md5($categoria->id) . ".jpg");
                            }
                            $excluir = anchor(base_url("administracao/categorias/excluir/" . md5($categoria->id)), "Excluir", array('onclick' => "return confirm('Confirmar exclusão da categoria?')"));
                            $alterar = anchor(base_url("administracao/categorias/alterar/" . md5($categoria->id)), "Alterar");
                            $this->table->add_row($imagem, $excluir, $alterar, $categoria->titulo);
                        }
                        $this->table->set_template(array('table_open' => "<table class='table table-striped miniaturas'>"));
                        echo $this->table->generate();
                        ?>  
                    </div>
                </div>     
            </div>
        </div>
    </div>
</div>






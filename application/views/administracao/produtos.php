<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Administrar Produtos</h1>
            </div>
            <div class="col-lg-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <b style="font-size: 18px">Adicionar novo produto</b>
                    </div>
                    <div class="panel-body">
                        <?php
                        echo validation_errors();
                        echo form_open("administracao/produtos/adicionar", array('class' => 'cadastros')) .
                            form_label('Código', 'txt_codigo') .
                            form_input(array('name' => 'txt_codigo', 'id' => 'txt_codigo', 'value' => set_value('txt_codigo'), 'class' => 'form-control')) . br() .
                            form_label('Título', 'txt_titulo') .
                            form_input(array('name' => 'txt_titulo', 'id' => 'txt_titulo', 'value' => set_value('txt_titulo'), 'class' => 'form-control')) . br() .
                            form_label('Preço', 'txt_preco') .
                            form_input(array('name' => 'txt_preco', 'id' => 'txt_preco', 'value' => set_value('txt_preco'), 'class' => 'form-control')) . br() .
                            form_label('Largura da caixa (mm)', 'txt_largura_caixa_mm') .
                            form_input(array('name' => 'txt_largura_caixa_mm', 'id' => 'txt_largura_caixa_mm', 'value' => set_value('txt_largura_caixa_mm'), 'class' => 'form-control')) . br() .
                            form_label('Altura da caixa (mm)', 'txt_altura_caixa_mm') .
                            form_input(array('name' => 'txt_altura_caixa_mm', 'id' => 'txt_altura_caixa_mm', 'value' => set_value('txt_altura_caixa_mm'), 'class' => 'form-control')) . br() .
                            form_label('Comprimento da caixa (mm)', 'txt_comprimento_caixa_mm') .
                            form_input(array('name' => 'txt_comprimento_caixa_mm', 'id' => 'txt_comprimento_caixa_mm', 'value' => set_value('txt_comprimento_caixa_mm'), 'class' => 'form-control')) . br() .
                            form_label('Peso da caixa (gramas)', 'txt_peso_gramas') .
                            form_input(array('name' => 'txt_peso_gramas', 'id' => 'txt_peso_gramas', 'value' => set_value('txt_peso_gramas'), 'class' => 'form-control')) . br() .
                            form_label('Descrição', 'txt_descricao') .
                            form_textarea(array('name' => 'txt_descricao', 'id' => 'txt_descricao', 'value' => set_value('txt_descricao'), 'class' => 'form-control')) . br() .
                            form_submit(array('name' => 'btn_adicionar', 'value' => 'Adicionar novo produto', 'class' => 'btn btn-primary')) .
                        form_close();
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <b style="font-size: 18px">Alterar produtos existentes</b>
                    </div>
                    <div class="panel-body">
                        <?php
                        $this->table->set_heading("Imagem", "Excluir", "Alterar", "Categoria", "Código", "Título", "Preço", "Status");
                        foreach ($produtos as $produto) {
                            $imagem = img("assets/img/categorias/categoria-sem-foto.png");
                            if (is_file("assets/img/produtos/" . md5($produto->id) . ".jpg")) {
                                $imagem = img("assets/img/produtos/" . md5($produto->id) . ".jpg");
                            }
                            $excluir = anchor(base_url("administracao/produtos/excluir/" . md5($produto->id)), "Excluir", array('onclick' => "return confirm('Confirmar exclusão do produto?')"));
                            $alterar = anchor(base_url("administracao/produtos/alterar/" . md5($produto->id)), "Alterar");
                            $categoria = $produto->categoria;
                            $codigo = $produto->codigo;
                            $titulo = $produto->titulo;
                            $preco = $produto->preco;
                            $status = ($produto->ativo == 1) ? "Ativo" : "Inativo";
                            $this->table->add_row($imagem, $excluir, $alterar, $categoria, $codigo, $titulo, $preco, $status);
                        }
                        $this->table->set_template(array('table_open' => "<table class='table table-striped miniaturas'>"));
                        echo $this->table->generate();
                        echo "<div class='paginate_button'>" .
                            $links_paginacao .
                        "</div>";
                        ?> 
                    </div>
                </div>            
            </div>
        </div>
    </div>
</div>









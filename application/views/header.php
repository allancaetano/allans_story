<div class="container">
    <div class="masthead">
        <div id="cadastro-e-login">
            <?php
            if (NULL != $this->session->userdata('logado')) {
                echo "Olá, " . $this->session->userdata('cliente')->nome . " " . 
                $this->session->userdata('cliente')->sobrenome . "&nbsp;&nbsp;  " .
                anchor(base_url("alterar-cadastro/" . md5($this->session->userdata('cliente')->id)), " Alterar cadastro |") .
                anchor(base_url('meus-pedidos'), " Meus pedidos |") .
                anchor(base_url("logout"), " Logout |");
            } else {
                echo "Olá, Visitante &nbsp" . anchor(base_url("cadastro"), "Cadastro |") .
                anchor(base_url("login"), " Login |");
            }
            echo anchor(base_url("carrinho"), " Carrinho [" . $this->cart->total_items() . "] ");
            ?>
        </div>
        <?php echo heading("The Allan's Store Brazil", 3, 'class="muted"');?>
        <ul class="nav nav-tabs">
            <li class="active"><?php echo anchor(base_url(), "Home"); ?></li>
            <li class="dropdown">
                <?php
                echo anchor(base_url("produtos"), "Produtos<b class='caret'></b>", array("class" => "dropdown-toggle", "data-toggle" => "dropdown"));
                ?>
                <ul class="dropdown-menu">
                    <?php
                    foreach ($categorias as $categoria) {
                        echo "<li>" . anchor(base_url("categoria/" . $categoria->id . "/" . limpar($categoria->titulo)), $categoria->titulo) . "</li>";
                    }
                    ?>
                </ul>
            </li>
            <li><?php echo anchor(base_url('home/fale_conosco'), "Fale Conosco"); ?></li>
            <li>
                <?php 
                $atributos = array("name" => "form_busca", "class" => "navbar-search pull-right");
                echo form_open(base_url("home/buscar"), $atributos);
                    echo form_input(array('type' => 'text', 'name' => 'txt_busca', 'placeholder' => 'Buscar', 'class' => 'search-query'));
                    echo form_input(array('type' => 'submit', 'name' => 'btn_busca', 'value' => 'Buscar', 'class' => 'btn btn-info'));
                echo form_close();
                ?>
            </li>
        </ul>
    </div>
<div id="homebody">
    <div class="alinhado-centro borda-base espaco-vertical">
         <?php
        if (NULL != $this->session->userdata('logado')) : ?>
            <h3>Seja bem-vindo a nossa loja</h3>
            <p>A melhor loja de comidas, especiarias e temperos. Compre on-line e receba em casa.</p>
        <?php else: ?>
            <h3>Seja bem-vindo a nossa loja</h3>
            <p>A melhor loja de comidas, especiarias e temperos. Compre on-line e receba em casa.</p>
            <a class="btn btn-medium btn-success" href="<?php echo base_url('cadastro/index'); ?>">Cadastre-se</a>
        <?php endif; ?>
    </div>
    <div class="row-fluid">
        <?php
        $contador = 0;
        foreach ($categorias as $categoria) {
            $contador ++;
            echo "<div class='span4 caixacategoria'>";
            echo heading($categoria->titulo, 3);
            if (is_file("assets/img/categorias/" . md5($categoria->id) . ".jpg")) {
                echo img("assets/img/categorias/" . md5($categoria->id) . ".jpg");
            }
            echo "<p>" . word_limiter($categoria->descricao, 20) . "</p>";
            echo anchor(base_url("categoria/" . $categoria->id . "/" . limpar($categoria->titulo)), "Ver produtos", array('class' => 'btn'));
            echo "</div>";
            if ($contador%3 == 0) {
                echo "</div><div class='row-fluid'>";
            }
        }
        ?>
    </div>
</div>


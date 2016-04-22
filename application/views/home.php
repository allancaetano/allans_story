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
        foreach ($destaques as $destaque) {
            $contador ++;
            echo "<div class='span4 caixacategoria'>" .
            heading($destaque->titulo, 3);
            if (is_file("assets/img/produtos/" . md5($destaque->id) . ".jpg")) {    
                echo img("assets/img/produtos/" . md5($destaque->id) . ".jpg");
            } else {
                echo img("assets/img/produto-sem-foto.png");
            }
            echo "<p>" . word_limiter($destaque->descricao, 20) . "</p>" .
            anchor(base_url("produto/" . $destaque->id . "/" . limpar($destaque->titulo)), "Ver Produto", array('class' => 'btn')) .
            "</div>";
            if ($contador%3 == 0) {
                echo "</div><div class='row-fluid'>";
            }
        }
        ?>
    </div>
</div>
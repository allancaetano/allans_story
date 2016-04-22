<div id="homebody">
    <div class="alinhado-centro borda-base espaco-vertical">
        <h3>Seja bem-vindo a nossa loja</h3>
        <p>Resultado da pesquisa</p>
    </div>
    <?php if (count($destaques) > 0): ?>
        <div class="row-fluid">
            <?php
            $contador = 0;
            foreach ($destaques as $destaque) {
                $contador ++;
                echo "<div class='span4 caixacategoria'>";
                echo heading($destaque->titulo, 3);
                echo "<p>" . word_limiter($destaque->descricao, 20) . "</p>";
                echo anchor(base_url("produto/" . $destaque->id . "/" . limpar($destaque->titulo)), "Ver Produto", array('class' => 'btn'));
                echo "</div>";
                if ($contador%3 == 0) {
                    echo "</div><div class='row-fluid'>";
                }
            }
            ?>
        </div>
    <?php else: ?>
        <div class="row-fluid">
            <h4 class="alinhado-centro">Nenhum resultado encontrado</h4>
        </div>
    <?php endif; ?>
</div>
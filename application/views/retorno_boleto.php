<?php
if ($transacao->transacao->erro()) {
    echo "<div class='row-fluid'>" .
        "<div class='span12'>" .
            "<p>Houve um erro ao processar o pagamento, a seguinte mensagem foi retornada pelo Gateway de Pagamento</p>" .
            heading("Código de erro: " . $transacao->transacao->erro->codigo, 4) .
            heading("Mensagem da operadora: " . $transacao->transacao->erro->mensagem, 4) .
        "</div>" .
    "</div>";
} else {
    echo "<div class='row-fluid'>" .
        "<div class='span12'>" .
            heading("Pedido: " . $transacao->transacao->numero_pedido, 4) .
            "<p>Seu boleto foi gerado corretamente e pose ser acessado pelo seguinte link.</p>" .
            anchor($transacao->transacao->url_acesso, "CLIQUE AQUI PARA IMPRIMIR O BOLETO", array('target' => 'blank')) .
            heading("Status: " . ucfirst(str_replace("_", " ", $transacao->transacao->status)), 5) .
            heading("Valor: " . reais($transacao->transacao->total), 5) .
            heading("ID da tranasação: " . $transacao->transacao->id, 5) .
        "</div>" .
    "</div>";
}

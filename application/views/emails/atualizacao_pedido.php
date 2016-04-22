<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>The Allan's Store Brazil</title>
</head>
<body>
    <h2>The Allan's Store Brazil</h2>
    <h4>Seu pedido foi atualizado</h4>
    <?php
    $pedidos_status = array(0 => "Novo", 1 => "Pagamento confirmado", 2 => "Enviado");
    foreach ($detalhes as $detalhe) {
        echo "<b>Pedido número: </b>" . $detalhe->id . br() .
        "<b> Data do pedido: </b>" . dataMySQL_to_dataBr($detalhe->data) . br(2) .
        "<b> Valor produtos: </b>" . reais($detalhe->produtos) . br() .
        "<b> Valor do frete: </b>" . reais($detalhe->frete) . br() .
        "<b> Total: </b>" . reais($detalhe->produtos + $detalhe->frete) . br(2) .
        "<b> Status: </b>" . $pedidos_status[$detalhe->status] . br() .
        "<b> Comentarios: </b>" . $detalhe->comentarios . br();
    }
    ?>
    <h4>Endereço para entrega</h4>
    <?php
    foreach ($cliente as $cli) {
        echo "<b>Para: </b>" . $cli->nome . " " . $cli->sobrenome . br();
        echo "<b>Rua: </b>" . $cli->rua . "<b>, Número: </b>" . $cli->numero . "<b>, Bairro </b>" . $cli->bairro .
        "<b>, Cidade: </b>" . $cli->cidade . "<b>, Estado: </b>" . $cli->estado . "<b> - CEP: </b>" . $cli->cep . br();
        echo "<b>Telefone: </b>" . $cli->telefone . "<b>, Celular: </b>" . $cli->celular;
    }
    ?>
    <h4>Itens do pedido</h4>
    <?php
    $this->table->set_heading("Foto", "Item", "Título", "Quantidade", "Valor Unitário", "Subtotal");
    foreach ($itens as $item) {
        $foto = "&nbsp;";
        if (is_file("assets/img/produtos/" . md5($item->id_produto) . ".jpg")) {
            $propriedades_foto = array("src" => "assets/img/produtos/" . md5($item->id_produto) . ".jpg", 'width' => '100');
            $foto = img($propriedades_foto);
        }
        $this->table->add_row($foto, $item->item, $item->titulo, $item->quantidade, reais($item->preco), reais($item->preco * $item->quantidade));
    }
    echo $this->table->generate();
    ?>
    <p>Obrigado por comprar conosco. Este e-mail foi encaminhado automaticamente pelo sistema em <?php echo date("d/m/Y H:i:s") ?></p>
</body>
</html>
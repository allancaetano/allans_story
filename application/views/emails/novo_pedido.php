<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>The Allan's Store Brazil</title>
</head>
<body>
    <?php 
    echo heading("The Allan's Store Brazil", 2). 
    heading($pedido['numero'], 3) .
    "Nome: " . $comprador['nome'] . br() .
    "CPF: " . $comprador['documento'] . br() .
    "Endereço: " . $comprador['endereco'] . br() .
    "Número: " . $comprador['numero'] . br() .
    "CEP: " . $comprador['cep'] . br() .
    "Bairro: " . $comprador['bairro'] . br() .
    "Cidade: " . $comprador['cidade'] . br() .
    "Estado: " . $comprador['estado'] . br() .
    heading("Dados do pagamento", 4) .
    "ID: " . $transacao->transacao->id . br() .
    "Total: RS " . $transacao->transacao->total . br() .
    "<p>Obrigado por comprar conosco. Este e-mail foi encaminhado automaticammente pelo nosso sistema em " . date("d/m/Y H:i:s") . ".</p>";
    ?>
</body>
</html>

<?php
echo form_open(base_url("carrinho/finalizar_compra"));
    echo "<div class='row-fluid'>" .
        "<div class='span3 texto-direita'>" . 
            heading("Valores", 3) .
            "Produtos: " . reais($this->cart->total()) . br() .
            "Frete: " . reais(str_replace(",", ".", $frete)) . br() .
            "Total: " . reais($this->cart->total() + str_replace(",", ".", $frete)) . br() .
            "Pagar com cartão: " . form_radio(array('name' => 'tipo_pagamento', 'value' => 'cartao', 'checked' => TRUE)) . br() .
            "Pagar com boleto: " . form_radio(array('name' => 'tipo_pagamento', 'value' => 'boleto')) . br() .
        "</div>" .
        "<div class='span1'>" .
            
        "</div>" .
        "<div id='dados_cartao'>" .
            "<div class='span4'>";
                $bandeiras = array('mastercard' => 'Mastercard', 'visa' => 'Visa');
                echo form_label('Bandeira do Cartão de Crédito') .
                form_dropdown('bandeira', $bandeiras) .
                "<div class='control-group error'>" . 
                    "<span class='help-block'>" . form_error('cartao_nome') . "</span>" .  
                "</div>" .
                form_label('Nome do Cartão de Crédito', 'cartao_nome') .
                form_input(array('id' => 'cartao_nome', 'name' => 'cartao_nome', 'value' => set_value('cartao_nome'))) .       
                "<div class='control-group error'>" . 
                    "<span class='help-block'>" . form_error('cartao_numero') . "</span>" .  
                "</div>" .
                form_label('Número do Cartão de Crédito', 'cartao_numero') .
                form_input(array('id' => 'cartao_numero', 'name' => 'cartao_numero', 'value' => set_value('cartao_numero'))) .
            "</div>" .
            "<div class='span4'>";
                echo "<div class='control-group error'>" . 
                    "<span class='help-block'>" . form_error('cartao_validade') . "</span>" .  
                "</div>" .
                form_label('Validade do Cartão', 'cartao_validade') .
                form_input(array('id' => 'cartao_validade', 'name' => 'cartao_validade', 'value' => set_value('cartao_validade'))) .
                "<div class='control-group error'>" . 
                    "<span class='help-block'>" . form_error('cartao_cvv') . "</span>" .  
                "</div>" .
                form_label('Código de Segurança', 'cartao_cvv') .
                form_input(array('id' => 'cartao_cvv', 'name' => 'cartao_cvv', 'value' => set_value('cartao_cvv')));
                $parcelas = array(1 => '1x de ' . reais($this->cart->total() + str_replace(",", ".", $frete)),
                                  2 => ('2x de ' . reais(($this->cart->total() + str_replace(",", ".", $frete))/2) . ' sem juros'),
                                  3 => ('3x de ' . reais(($this->cart->total() + str_replace(",", ".", $frete))/3)) . ' sem juros');
                echo form_label('Parcelamento', 'parcelamento') .
                form_dropdown('parcelamento', $parcelas). br(2) .
            "</div>" .
        "</div>" .
        form_submit(array('id' => 'pagar', 'value' => 'Pagar e finalizar compra', 'class' => 'btn btn-info')) .
    form_close().
"</div>";
?>

<script type="text/javascript">
    $(document).ready(function() {
        $("input[name='tipo_pagamento']").click(function() {
            if($("input[name='tipo_pagamento']:checked").val() == 'boleto') {
                $('#dados_cartao').hide();
            } else {
                $('#dados_cartao').show();
            }
        });
    });

    jQuery(function($){
        $("#cartao_numero").mask("9999 9999 9999 9999");
        $("#cartao_validade").mask("99/99");
        $("#cartao_cvv").mask("999");
    });
</script>
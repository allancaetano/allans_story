<div id="homebody">
    <div class="alinhado-centro borda-base espaco-vertical">
        <h3>Envie sua mensagem</h3>
        <p>Você pode sugerir qualquer sugestão, comentar alguma experiência desagradavel ou tirar suas dúvidas sobre determinado produto.<br/>
        Estamos aqui para fazer sua navegação em nosso Website ser a melhor possível.</p>
    </div>
    <div class="row-fluid alinhado-centro">
        <?php
        echo form_open(base_url('home/enviar_mensagem'));
            if (NULL != $this->session->userdata('logado')) {    
                echo "<div class='span12'>" . br() .
                    form_input(array('name' => 'txt_nome', 'id' => 'txt_nome', 'value' => $this->session->userdata('cliente')->nome . " " . $this->session->userdata('cliente')->sobrenome, 'placeholder' => 'Nome', 'class' => 'span3', 'readonly' => 'true')) . br() .
                    form_input(array('name' => 'txt_email', 'id' => 'txt_email', 'value' => $this->session->userdata('cliente')->email, 'placeholder' => 'E-mail', 'class' => 'span3', 'readonly' => 'true')) . br();
            } else {
                echo "<div class='span12'>" . br() .
                    "<div class='control-group error'>" . 
                        "<span class='help-block'>" . form_error('txt_nome') . "</span>" .  
                    "</div>" .
                    form_input(array('name' => 'txt_nome', 'id' => 'txt_nome', 'value' => set_value('txt_nome'), 'placeholder' => 'Nome Completo', 'class' => 'span3')) . br() .

                    "<div class='control-group error'>" . 
                        "<span class='help-block'>" . form_error('txt_email') . "</span>" .  
                    "</div>" .
                    form_input(array('name' => 'txt_email', 'id' => 'txt_email', 'value' => set_value('txt_email'), 'placeholder' => 'E-mail', 'class' => 'span3')) . br();
            }
                echo "<div class='control-group error'>" . 
                    "<span class='help-block'>" . form_error('txt_assunto') . "</span>" .  
                "</div>" .
                form_input(array('name' => 'txt_assunto', 'id' => 'txt_assunto', 'value' => set_value('txt_assunto'), 'placeholder' => 'Assunto', 'class' => 'span3')) . br() .     

                "<div class='control-group error'>" . 
                    "<span class='help-block'>" . form_error('txt_msg') . "</span>" .  
                "</div>" .
                form_textarea(array('name' => 'txt_msg', 'id' => 'txt_msg', 'value' => set_value('txt_msg'), 'placeholder' => 'Deixe sua mensagem aqui', 'class' => 'span3')) . br() .
                form_submit(array('name' => 'btn_enviar', 'value' => 'Enviar', 'class' => 'btn btn-success')).
            "</div>" .  
        form_close();
        ?>
    </div>
</div>


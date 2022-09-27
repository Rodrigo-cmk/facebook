<?php
    // Função de limpeza aqui, para compartilhar entre scripts
    function limpeza($valor){
        $valor = trim($valor);  // Limpa inicio e fim das entradas
        $valor = htmlspecialchars($valor); // Retira efeitos de entradas HTML
        $valor = stripslashes($valor);  // Retira barras invertidas
        return $valor;
    }
?>
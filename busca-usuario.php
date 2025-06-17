<?php

require 'dados-pessoais.php';

try {
    $dados_pessoais = new DadosPessoais();
    
    $res = $dados_pessoais->buscar_todos();
   
    echo json_encode($res);

} catch (\Throwable $th) {
    //throw $th;
}
<?php

require 'dados-pessoais.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $dados_pessoais = new DadosPessoais();
    $dados_pessoais->deletar($id);

    echo json_encode(["msg" => "Registro excluído com sucesso", "id" => $id]);
}
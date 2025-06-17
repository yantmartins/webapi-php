<?php

require 'dados-pessoais.php';

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $email = $_POST["email"];

    try {
        
        $usuario = new DadosPessoais();

        $usuario->cadastrar($nome, $idade, $email);
        echo json_encode(["success" => true]);
    } catch (\Throwable $th) {
        //throw $th;
    }
}
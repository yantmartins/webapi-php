<?php

require 'database.php';

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $email = $_POST["email"];

    $db = new Database("dados_pessoais");

    $conn = $db->conectar();

    try {
        $stmt = $conn->prepare(' INSERT INTO dados_pessoais(nome, idade, email) VALUES (:nome, :idade, :email)');

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':idade', $idade);
        $stmt->bindParam(':email', $email);

        $stmt->execute();
        echo json_encode(["success" => true]);
    } catch (\Throwable $th) {
        //throw $th;
    }
}
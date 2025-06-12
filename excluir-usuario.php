<?php

require 'database.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $db = new Database('dados_pessoais');
    $conn = $db->conectar();
    $stmt = $conn->prepare("DELETE FROM dados_pessoais WHERE id = :id");

    $stmt->bindParam(":id", $id);

    $stmt->execute();

    echo json_encode(["msg" => "Registro excluído com sucesso", "id" => $id]);
}
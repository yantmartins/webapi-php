<?php

require 'Database.php';

try {
    $db = new Database("dados_pessoais");
    $conn = $db->conectar();
    $stmt = $conn->prepare("SELECT * FROM dados_pessoais");
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);

} catch (\Throwable $th) {
    //throw $th;
}
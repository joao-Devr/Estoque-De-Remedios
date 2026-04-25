<?php

include "conexao.php";

$id = $_REQUEST["id"] ?? "";

try {
    if (empty($id)) {
        throw new Exception("ID não fornecido");
    }

    $consulta = $conexao->prepare("DELETE FROM remedios WHERE id = :id");
    $consulta->bindParam(':id', $id, PDO::PARAM_INT);
    $consulta->execute();

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(["mensagem" => "Produto deletado com sucesso!"]);
} catch (PDOException $e) {
    header('Content-Type: application/json', true, 500);
    echo json_encode(["erro" => $e->getMessage()]);
} catch (Exception $e) {
    header('Content-Type: application/json', true, 400);
    echo json_encode(["erro" => $e->getMessage()]);
}

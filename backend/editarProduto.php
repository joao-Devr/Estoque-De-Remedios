<?php

include "conexao.php";

$id = $_REQUEST["id"] ?? "";
$quantidade = $_REQUEST["quantidade"] ?? "";

try {
    if (empty($id) || empty($quantidade)) {
        throw new Exception("ID ou quantidade não fornecidos");
    }

    $consulta = $conexao->prepare("UPDATE remedios SET quantidade = :quantidade WHERE id = :id");
    $consulta->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);
    $consulta->bindParam(':id', $id, PDO::PARAM_INT);
    $consulta->execute();

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(["mensagem" => "Produto atualizado com sucesso!"]);
} catch (PDOException $e) {
    header('Content-Type: application/json', true, 500);
    echo json_encode(["erro" => $e->getMessage()]);
} catch (Exception $e) {
    header('Content-Type: application/json', true, 400);
    echo json_encode(["erro" => $e->getMessage()]);
}

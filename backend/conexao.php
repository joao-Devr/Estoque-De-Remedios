<?php
require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

try {
    // Cria conexão PDO
    $conexao = new PDO("mysql:host=" . $_ENV['DB_HOST'] . ";port=" . $_ENV['DB_PORT'] . ";dbname=" . $_ENV['DB_NAME'] . ";charset=utf8",$_ENV['DB_USER'],$_ENV['DB_PASSWORD']);
    
   
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){ 
    header('Content-Type: application/json');
    echo json_encode(["erro" => "Conexão falhou: " . $e->getMessage()]);
    exit;
}
?>
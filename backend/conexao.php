<<<<<<< HEAD
<?php
$database = "Estoque_de_Remedios";
$servername = "127.0.0.1"; 
$username = "root";
$password = "Joaopc35.";
$port = "3312";
try {
    // Cria conexão PDO
    $conexao = new PDO("mysql:host=$servername;port=$port;dbname=$database;charset=utf8", $username, $password);
    
   
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){ 
    echo "Conexão falhou: " . $e->getMessage(); 
}
=======
<?php
$database = "monolety";
$servername = "127.0.0.1"; 
$username = "root";
$password = "kali";

try {
    // Cria conexão PDO
    $conexao = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);
    
   
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){ 
    echo "Conexão falhou: " . $e->getMessage(); 
}
>>>>>>> fa91bf1da99800632aa31ddfe1feb61f47e53817
?>
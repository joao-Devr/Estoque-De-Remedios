<<<<<<< HEAD
<?php
session_start();

if( empty($_SESSION['email']) ){
  header("Location: index.php");
  exit; 
}

$email = $_SESSION['email'];
$nome = $_SESSION['nome'];
$tipo = $_SESSION['tipo'];
=======
<?php
session_start();

if( empty($_SESSION['email']) ){
  header("Location: index.php");
  exit; 
}

$email = $_SESSION['email'];
$nome = $_SESSION['nome'];
$tipo = $_SESSION['tipo'];
>>>>>>> fa91bf1da99800632aa31ddfe1feb61f47e53817

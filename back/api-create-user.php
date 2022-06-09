<?php
header('Access-Control-Allow-Origin: *');
require_once(__DIR__ . '/conexao.php');
if (isset($_POST['name'])) {
  $nome = $_POST['name'];
}
if (isset($_POST['lastName'])) {
  $sobre_nome = $_POST['lastName'];
}
if (isset($_POST['email'])) {
  $email = $_POST['email'];
}
if (isset($_POST['password'])) {
  $password = $_POST['password'];
}
if (isset($_POST['tradeLink'])) {
  $tradeLink = $_POST['tradeLink'];
}
if (isset($_POST['cep'])) {
  $cep = $_POST['cep'];
}
if (isset($_POST['endereco'])) {
  $endereco = $_POST['endereco'];
}
if (isset($_POST['estado'])) {
  $estado = $_POST['estado'];
}
if (isset($_POST['pais'])) {
  $pais = $_POST['pais'];
}

if (isset($_POST['celular'])) {
  $celular = $_POST['celular'];
}





try {

  $stmt = $pdo->prepare("INSERT INTO `usuarios` (`nome`, `sobre_nome`, `email`, `senha`, `trade_link`, `cep`, `rua_numero`, `estado`,`pais`, `celular`,`permissao`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
  $stmt->execute([$nome, $sobre_nome, $email, $password, $tradeLink, $cep, $endereco, $estado, $pais, $celular, 3]);
} catch (Exception $ex) {
  echo "<br>" . $ex;
}

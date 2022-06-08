<?php
header('Access-Control-Allow-Origin: *');
require_once(__DIR__ . '/conexao.php');
$nome = isset($_POST['name']) ? $_POST['name'] : 'nome';
$sobre_nome = isset($_POST['lastName']) ? $_POST['lastname'] : 'sobreNome';
$email = isset($_POST['email']) ? $_POST['email'] : 'email@gmail.com';
$password = isset($_POST['password']) ? md5($_POST['password']) : md5(12345678);
$tradeLink = isset($_POST['tradeLink']) ? $_POST['tradeLink'] : 'steam.com/teste';
$cep = isset($_POST['cep']) ? $_POST['cep'] : '97670000';
$endereco = isset($_POST['endereco']) ? $_POST['endereco'] : 'general osorio,3052';
$pais = isset($_POST['pais']) ? $_POST['pais'] : 'Brazil';
$ddd = isset($_POST['ddd']) ? $_POST['ddd'] : '55';
$celular = isset($_POST['celular']) ? $_POST['celular'] : '999330461';


try {

  $stmt = $pdo->prepare("INSERT INTO `usuarios` (`nome`, `sobre_nome`, `email`, `senha`, `trade_link`, `cep`, `rua_numero`, `pais`, `celular`) VALUES (?,?,?,?,?,?,?,?,?)");
  $stmt->execute([$nome, $sobre_nome, $email, $password, $tradeLink, $cep, $endereco, $pais, $celular,"cliente"]);
} catch (Exception $ex) {
  echo "<br>" . $ex;
}

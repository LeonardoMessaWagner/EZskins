<?php
header('Access-Control-Allow-Origin: *');
use ArangoDBClient\ConnectException as ArangoConnectException;
use ArangoDBClient\Exception as ArangoException;
use ArangoDBClient\Statement as ArangoStatement;
require_once(__DIR__.'/arangodb.php');

$user['name'] = $_POST['name'];
$user['lastName'] = $_POST['lastName'];
$user['email'] = $_POST['email'];
$user['password'] = md5($_POST['password']);
$user['tradeLink'] = $_POST['tradeLink'];
$user['cep'] = $_POST['cep'];
$user['endereco'] = $_POST['endereco'];
$user['pais'] = $_POST['pais'];
$user['ddd'] = $_POST['ddd'];
$user['celular'] = $_POST['celular'];

try{
  $stmt = new ArangoStatement(
    $db,
    [ 
      'query'=>'INSERT @user IN users RETURN NEW',
      'bindVars' => [
        'user' => $user
      ]
    ]
  );
  $cursor = $stmt->execute();
  $data = $cursor->getAll();
  header('Content-Type: application/json');
  echo json_encode($data);
  
}catch(Exception $ex){
  echo $ex;
}
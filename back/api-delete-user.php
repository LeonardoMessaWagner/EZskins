<?php
header('Access-Control-Allow-Origin: *');
use ArangoDBClient\ConnectException as ArangoConnectException;
use ArangoDBClient\Exception as ArangoException;
use ArangoDBClient\Statement as ArangoStatement;
require_once(__DIR__.'/arangodb.php');

try{
  $stmt = new ArangoStatement(
    $db,
    [ 
      'query'=>'REMOVE @user IN users',
      'bindVars' => [
        'user' => $_POST['_key']
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
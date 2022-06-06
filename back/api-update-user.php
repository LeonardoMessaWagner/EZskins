<?php
header('Access-Control-Allow-Origin: *');

use ArangoDBClient\ConnectException as ArangoConnectException;
use ArangoDBClient\Exception as ArangoException;
use ArangoDBClient\Statement as ArangoStatement;

require_once(__DIR__ . '/arangodb.php');

if (isset($_POST['name'])) {
    $user['name'] = $_POST['name'];
}
if (isset($_POST['lastName'])) {
    $user['lastName'] = $_POST['lastName'];
}
if (isset($_POST['email'])) {
    $user['email'] = $_POST['email'];
}
if (isset($_POST['password'])) {
    $user['password'] = md5($_POST['password']);
}
if (isset($_POST['tradeLink'])) {
    $user['tradeLink'] = $_POST['tradeLink'];
}
if (isset($_POST['cep'])) {
    $user['cep'] = $_POST['cep'];
}

if (isset($_POST['endereco'])) {
    $user['endereco'] = $_POST['endereco'];
}
if (isset($_POST['pais'])) {
    $user['pais'] = $_POST['pais'];
}

if (isset($_POST['ddd'])) {
    $user['ddd'] = $_POST['ddd'];
}
if (isset($_POST['celular'])) {
    $user['celular'] = $_POST['celular'];
}


try {
    $stmt = new ArangoStatement(
        $db,
        [
            'query' => 'UPDATE @key WITH @user IN users',
            'bindVars' => [
                'key' => $_POST['_key'],
                'user' => $user
            ]
        ]
    );
    $cursor = $stmt->execute();
    $data = $cursor->getAll();
    // header('Content-Type: application/json');
    echo json_encode($data);
} catch (Exception $ex) {
    echo $ex;
}

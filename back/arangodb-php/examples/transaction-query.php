<?php

namespace ArangoDBClient;

require __DIR__ . '/init.php';

try {
    $connection         = new Connection($connectionOptions);
    $collectionHandler  = new CollectionHandler($connection);
    $documentHandler    = new DocumentHandler($connection);
    $transactionHandler = new StreamingTransactionHandler($connection);

    // set up a document collection "users"
    $collection = new Collection('users');
    try {
        $collectionHandler->create($collection);
    } catch (\Exception $e) {
        // collection may already exist - ignore this error for now
    }

    // clear everything, so we can start with a clean state
    $collectionHandler->truncate($collection);

    // creates a transaction object
    $trx = new StreamingTransaction($connection, [
         TransactionBase::ENTRY_COLLECTIONS => [
             TransactionBase::ENTRY_WRITE => 'users'
         ]
    ]);

    // starts the transaction
    $trx = $transactionHandler->create($trx);
       
    // get a StreamingTransactionCollection object. this is used to execute operations
    // in a transaction context
    $trxCollection = $trx->getCollection('users');

    // calling query() directly on the transaction makes the AQL query execute in the
    // context of the running transaction    
    $result = $trx->query([
        'query' => 'FOR i IN 1..10 INSERT { _key: CONCAT("test", i), value: i } INTO @@collection',
        'bindVars' => [ '@collection' => $trxCollection->getName() ]
    ]);

    echo "BEFORE COMMIT" . PHP_EOL;
    echo "COLLECTION COUNT OUTSIDE OF TRANSACTION IS: ", $collectionHandler->count($collection) . PHP_EOL;
    echo "COLLECTION COUNT INSIDE OF TRANSACTION IS: ", $collectionHandler->count($trxCollection) . PHP_EOL;

    // commits the transaction
    $transactionHandler->commit($trx);

    echo PHP_EOL;
    echo "AFTER COMMIT" . PHP_EOL;
    echo "COLLECTION COUNT IS: ", $collectionHandler->count($collection) . PHP_EOL;
} catch (ConnectException $e) {
    print $e . PHP_EOL;
} catch (ServerException $e) {
    print $e . PHP_EOL;
} catch (ClientException $e) {
    print $e . PHP_EOL;
}

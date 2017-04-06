<?php

include_once '../lib/autoload.php';
include_once 'UsageModel.php';

/**
 *  This exemple need a model
 *  After example use Connection
 *  This example need of primary key defined and have data in attribute
 *
 *  1. Extends your model to class Model, using namespace orm\model\Model
 *
 *  2. Set the static attribute $primary_key in your model
 *      @var This is an string
 *
 *  3. Set the static attribute $table_name in your model
 *      @var This is an string
 *
 *  4. For get all data on current model
 *      @return Array with object if exists the data
 *      @return Array haven't data
 *
 */

use orm\connection\Connection;
use quickcooffe\usage\UsageModel;

try {
    /**
     * Initialize the connection using static method Connection::initialize()
     * @return Connection
     */
    $connection = Connection::initialize();

    /**
     *  Add the configurations using the method addConfig, accepts various configurations
     *      Arguments:
     *      - $connection->addConfig('driver', 'user', 'password', 'host', 'database', 'connectionName', 'port');
     *      - Driver options ['mysql', 'pgsql'] -- Mysql, postgres
     * @return Connection
     */
    $connection->addConfig('mysql', 'root', '', 'localhost', 'local_controlook', 'local', 3306);
    $connection->addConfig('pgsql', 'postgres', '123456', 'localhost', 'local_controlook', 'postgres_local', 5432);

    /**
     * Set connection for active using the method setConnection
     *      - $connection->setConnection('connectionName');
     * @return Connection
     */
    $connection->setConnection('postgres_local');

    /**
     *  4. For get all data on current model
     *      @return Array with object if exists the data
     *      @return Array haven't data
     */
    $usage = UsageModel::all();

    if(count($usage) > 0){
        var_dump($usage);
    }else{
        echo 'Haven\'t data for this Model.';
    }

} catch (Exception $e) {
    /**
     * All Exceptions
     */
    echo $e->getMessage();
}
<?php

include_once '../lib/autoload.php';
include_once 'UsageModel.php';

/**
 *  This exemple need a model
 *  After example use Connection
 *
 *  1. Extends your model to class Model, using namespace orm\model\Model
 *
 *  2. Set the static attribute $primary_key in your model
 *      @var This is an string
 *
 *  3. Set the static attribute $table_name in your model
 *      @var This is an string
 *
 *  4. For search your data on primary key use the static function find
 *      - The first argument is the primary key
 *      @var integer
 *      @return Array with object if exists the data
 *      @return Null if not exists the data
 *
 */

use MocOrm\Connection\ConnectionManager;
use MocOrm\Usage\UsageModel;

try {
    /**
     * Initialize the connection using static method ConnectionManager::initialize()
     * @param \Closure $connection
     * @return \ConnectionManager
     */
    $connectionManager = ConnectionManager::initialize(function ($config) {
        /**
         * Add the configurations using the method addConfig, accepts various configurations
         *      Arguments:
         *      - $config->addConfig('driver', 'user', 'password', 'host', 'database', 'connectionName', 'port', charset, schema);
         *      - Driver options ['mysql', 'pgsql'] -- Mysql, postgres
         * @return \MocOrm\Connection\Config
         */

        $config->addConfig(
            'mysql',
            'user',
            'pass',
            'host',
            'database',
            'name',
            'port',
            'char');
    });

    /**
     *  4. For search your data on primary key use the static function find
     *      - The first argument is the primary key
     *      @return The object if exists the data
     *      @return Null if not exists the data
     */
    $usage = UsageModel::find(246);

    if(!is_null($usage)){
        echo 'Id: '.$usage->id.'<br />';
        echo 'Nome: '.$usage->nome.'<br />';
    }else{
        echo 'Not have data for this ID.';
    }

} catch (Exception $e) {
    /**
     * All Exceptions
     */
    echo $e->getMessage();
}
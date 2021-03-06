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
 *  4. Instantiate the model
 *
 *  5. Set values in attributes
 *
 *  6. Use the method 'save' of you model instantiated
 *      @return model instantiated if save success
 *      @return false if save not success
 *
 */

use MocOrm\Connection\ConnectionManager;
use MocOrm\Usage\UsageModel;

try {

    /**
     * Initialize the connection using static method Connection::initialize()
     * @return Connection
     */


     /**
     *  Add the configurations using the method addConfig, accepts various configurations
     *      Arguments:
     *      - $connection->addConfig('driver', 'user', 'password', 'host', 'database', 'connectionName', 'port');
     *      - Driver options ['mysql', 'pgsql'] -- Mysql, postgres
     * @return Connection
     */

    $connectionManager = ConnectionManager::initialize(function ($config) {
        /**
         * Add the configurations using the method addConfig, accepts various configurations
         *      Arguments:
         *      - $connection->addConfig('driver', 'user', 'password', 'host', 'database', 'connectionName', 'port', charset, schema);
         *      - Driver options ['mysql', 'pgsql'] -- Mysql, postgres
         * @return Connection
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
     * Set connection for active using the method setConnection
     *      - $connection->setConnection('connectionName');
     * @return Connection
     */
//    $connection->setConnection('postgres_local');
//    $connectionManager->open('local');

    $usage = new UsageModel();

    /**
     * 5. Set values in attributes
     */

    $usage->nome = 'Teste Save';
    $result = $usage->save();
    var_dump($result);
    /**
     * 6. Use the method 'save' of you model instantiated
     * @return model instantiated if save success
     * @return false if save not success
     */
   /* $result = $usage->save();
    $connectionManager::open('local');
    $connectionManager::change('local');

    $usage = new UsageModel();*/

    /**
     * 5. Set values in attributes
     */
   /* $usage->id2 = 10;
    $usage->nome = 'Teste Save';*/

    /**
     * 6. Use the method 'save' of you model instantiated
     * @return model instantiated if save success
     * @return false if save not success
     */
    /*$result = $usage->save();

    if(is_object($result)){
        echo 'Id: '.$usage->id.'<br />';
        echo 'Nome: '.$usage->nome.'<br />';
    }else{
        echo 'This data haven\'t save.';
    }*/
} catch (Exception $e) {
    /**
     * All Exceptions
     */
    echo $e->getMessage();
}
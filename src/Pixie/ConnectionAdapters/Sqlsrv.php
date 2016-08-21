<?php namespace Pixie\ConnectionAdapters;

class Sqlsrv extends BaseAdapter
{
    /**
     * @param $config
     *
     * @return mixed
     */
    protected function doConnect($config)
    {
        $connectionString = "sqlsrv:Server={$config['host']}";

        if (isset($config['port'])) {
            $connectionString .= ",port={$config['port']}";
        }

        $connectionString .= ";Database={$config['database']}";

        $connection = $this->container->build(
            '\PDO',
            array($connectionString, $config['username'], $config['password'], $config['options'])
        );

        // https://msdn.microsoft.com/en-us/library/ff628157(v=sql.105).aspx
        /*if (isset($config['charset'])) {
            // force but utf8 is default
            $connection->setAttribute(PDO::SQLSRV_ATTR_ENCODING, PDO::SQLSRV_ENCODING_UTF8);
            //$connection->setAttribute(PDO::SQLSRV_ATTR_ENCODING, PDO::SQLSRV_ENCODING_SYSTEM);
            //$connection->setAttribute(PDO::SQLSRV_ATTR_ENCODING, PDO::SQLSRV_ENCODING_BINARY);
            //$connection->prepare("SET NAMES '{$config['charset']}'")->execute();
        }*/

        //if (isset($config['schema'])) {
            // $connection->prepare("SET search_path TO '{$config['schema']}'")->execute();
        //}

        return $connection;
    }
}

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
        // @see http://php.net/manual/en/ref.pdo-sqlsrv.connection.php
        $connectionString = "sqlsrv:Server={$config['host']}";

        if (isset($config['port'])) {
            $connectionString .= ",port={$config['port']}";
        }

        $connectionString .= ";Database={$config['database']}";

        $connection = $this->container->build(
            '\PDO',
            array($connectionString, $config['username'], $config['password'], $config['options'])
        );

        return $connection;
    }
}

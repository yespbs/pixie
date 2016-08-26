<?php namespace Pixie\ConnectionAdapters;

class Dblib extends BaseAdapter
{
    /**
     * @param $config
     *
     * @return mixed
     */
    protected function doConnect($config)
    {
        // @see http://php.net/manual/en/ref.pdo-dblib.connection.php
        $connectionString = "dblib:host={$config['host']}";

        if (isset($config['port'])) {
            $connectionString .= ":{$config['port']}";
        }

        $connectionString .= ";dbname={$config['database']}";

        if (isset($config['charset'])) {
            $connectionString .= ";charset={$config['charset']}";
        }

        $connection = $this->container->build(
            '\PDO',
            array($connectionString, $config['username'], $config['password'], $config['options'])
        );

        return $connection;
    }
}

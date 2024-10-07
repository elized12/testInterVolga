<?php

class Database
{
    private $host = "localhost";
    private $login = "root";
    private $password = 'root';
    private $dbname = "test";

    private static $instance = null;

    private $connection = null;

    protected function __construct()
    {
        $this->connection = new PDO('mysql:dbname=' . $this->dbname . ';host=' . $this->host, $this->login, $this->password);
    }

    protected function __clone() {} //delete

    public function __wakeup() // detele
    {
        throw new \BadMethodCallException("Unable to deserialize");
    }

    public static function get_instance(): Database
    {
        if (null === self::$instance) 
        {
            self::$instance = new static(); // вызов private construct
        }

        return self::$instance;
    }

    public static function connection(): PDO
    {
        return static::get_instance()->connection; //возращает connection
    }

    public static function prepare($statement): PDOStatement
    {
        return static::connection()->prepare($statement);
    }

}

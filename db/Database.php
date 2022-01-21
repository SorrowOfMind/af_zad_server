<?php

namespace app\db;

use PDO;
use PDOException;

class Database {
    private $host = 'localhost';
    private $dbName = 'adsfox';
    private $user = 'root';
    private $pswd = '';

    public PDO $pdo;

    public function __construct()
    {
        $dsn = "mysql:host={$this->host};dbname={$this->dbName}";

        try
        {
            $this->pdo = new PDO($dsn, $this->user, $this->pswd);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $err)
        {
            echo $err->getMessage();
        }
    }
}
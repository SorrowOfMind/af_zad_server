<?php

namespace app\models;

use app\db\Database;

class Channel
{
    private Database $db;
    private $table = 'channels';
    public $id;
    public $name;
    public $clients;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function create()
    {
        $qry = "INSERT INTO {$this->table} (name, num_clients) VALUES (:name, :num_clients)";
        $stmt = $this->db->pdo->prepare($qry);

        $stmt->bindValue('name', $this->name);
        $stmt->bindValue('num_clients', $this->clients);

        if ($stmt->execute())
            return true;
        else
        {
            printf("Błąd: %s\n", $stmt->error);
            return false;
        }
    }
}
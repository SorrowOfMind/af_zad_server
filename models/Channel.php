<?php

namespace app\models;

use app\db\Database;
use PDO;

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

    public function get()
    {
        $qry = "SELECT * FROM {$this->table}";
        $stmt = $this->db->pdo->prepare($qry);
        $stmt->execute();
        return $stmt;
    }

    public function create()
    {
        $qry = "INSERT INTO {$this->table} (name, num_clients) VALUES (:name, :num_clients)";
        $stmt = $this->db->pdo->prepare($qry);

        $stmt->bindValue('name', $this->name);
        $stmt->bindValue('num_clients', $this->clients);

        if ($stmt->execute())
        {
            $this->id = $this->db->pdo->lastInsertId();
            return true;
        }
        else
        {
            printf("Błąd: %s\n", $stmt->error);
            return false;
        }
    }

    public function delete()
    {
        $qry = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->pdo->prepare($qry);

        $stmt->bindValue('id', $this->id);

        if ($stmt->execute())
            return true;
        else
        {
            printf("Błąd: %s\n", $stmt->error);
            return false;
        }
    }

    public function update()
    {
        $qry = "UPDATE {$this->table} SET num_clients = :num_clients WHERE id = :id";
        $stmt = $this->db->pdo->prepare($qry);

        $stmt->bindValue('num_clients', $this->clients);
        $stmt->bindValue('id', $this->id);

        if ($stmt->execute())
            return true;
        else
        {
            printf("Błąd: %s\n", $stmt->error);
            return false;
        }
    }
}
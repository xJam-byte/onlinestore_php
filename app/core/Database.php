<?php
class Database
{
    private $pdo;
    private $query;

    public function __construct()
    {
        $this->pdo = new PDO(
            "mysql:host=" . HOST . ";" .
            "port=" . PORT . ";" .
            "dbname=" . DATABASE . ";" .
            "charset=" . CHARSET,
            USER,
            PASSWORD
        );
    }

    public function __destruct()
    {
        if ($this->query !== null) {
            $this->query = null;
        }
        if ($this->pdo !== null) {
            $this->pdo = null;
        }
    }

    public function getRow($sql, $args = [])
    {
        $this->query = $this->pdo->prepare($sql);
        $this->query->execute($args);
        return $this->query->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll($sql, $args = [])
    {
        $this->query = $this->pdo->prepare($sql);
        $this->query->execute($args);
        return $this->query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCount($sql, $args = [])
    {
        $this->query = $this->pdo->prepare($sql);
        $this->query->execute($args);
        return $this->query->rowCount();
    }
    public function query($sql, $args = [])
    {
        $this->query = $this->pdo->prepare($sql);

        return $this->query->execute($args) ? 1 : 0;
    }


    public function insert($sql, $args = [])
    {
        $this->query = $this->pdo->prepare($sql);
        return ($this->query->execute($args)) ? $this->pdo->lastInsertId() : 0;
    }
}
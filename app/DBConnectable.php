<?php


namespace App;

use PDO;

trait DBConnectable
{
    private string $host = "localhost";
    private string $user = "root";
    private string $pwd = "root";
    private string $db = "participate";

    private function getConnection()
    {
        $dsn = "mysql:host={$this->host};dbname={$this->db}";
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        return $pdo;
    }
}
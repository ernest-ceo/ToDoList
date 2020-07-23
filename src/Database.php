<?php
declare(strict_types=1);

namespace App;
use PDO;
use PDOException;

class Database
{
    public $pdo;

    public function __construct(array $config)
    {
        $dsn = "mysql:dbname=%s;host=%s";
        $dsn = sprintf($dsn, $config['dbname'], $config['host']);

        try {
            $this->pdo = new PDO(
                $dsn,
                $config['user'],
                $config['password']
            );

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            echo 'Błąd połączenia z bazą danych';
            die;
        }
    }
}
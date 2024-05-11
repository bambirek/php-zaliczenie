<?php

declare(strict_types=1);

namespace App;

use App\Exception\ConfigurationException;
use App\Exception\StorageException;
use Exception;
use PDO;
use PDOException;
use Throwable;

class Database
{
    private PDO $conn;
    public function __construct(array $config)
    {
        try {
            $this->validateConfig($config);
            $this->createConnection($config);
        } catch (PDOException $e) {
            throw new StorageException("Problem z połączeniem do bazy!");
        }
    }

    public function createNote(array $data): void
    {
        try {
            $title = $this->conn->quote($data['title']);
            $description = $this->conn->quote($data['description']);
            $created = date('Y-m-d H:i:s');
            $query = "INSERT INTO notes (title, description, created) VALUES($title, $description, '$created')"; //APOSTROF
            $result = $this->conn->exec($query);
        } catch (Throwable $e) {
            throw new StorageException('Nie udało się utworzyć nowej notatki', 400, $e);
        }
    }
    private function createConnection(array $config): void
    {
        $dsn = "mysql:dbname={$config['database']}host={$config['host']}";
        $this->conn = new PDO(
            $dsn,
            $congif['user'],
            $config['password'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
            );
            // $connection = new PDO('lalalalala');
    }
    private function validateConfig(array $config): void
    {
        if (empty($config['database']) || empty($config['user']) || empty($config['host'])) {
            throw new ConfigurationException("Problem z konfiguracją bazy - skontaktuj się z administratorem.");
        }
    }
}

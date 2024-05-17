<?php

declare(strict_types=1);

namespace Framework;

use PDO, PDOException;

class Database {
    private PDO $connection;
    public function __construct(
        string $driver,
        array $config,
        string $username = null,
        string $password = null
    ) {
        $config = http_build_query(data: $config, arg_separator: ';');
        $dsn    = "{$driver}:{$config}";

        try {
            $this->connection = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            echo "Unable to connect to database : " . $e;
            die();
        }
    }

    public function query(string $query) {
        $this->connection->query($query);
    }
}
<?php
declare(strict_types=1);

namespace Config;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $instance = null;

    public static function connect(): PDO
    {
        if (self::$instance === null) {
            $host = getenv('DB_HOST') ?: '127.0.0.1';
            $dbname = getenv('DB_DATABASE') ?: 'wedding_db';
            $user = getenv('DB_USERNAME') ?: 'root';
            $defaultPass = (PHP_OS_FAMILY === 'Linux') ? 'Mpp@Db2026Secure!' : '';
            $pass = getenv('DB_PASSWORD') !== false ? (string)getenv('DB_PASSWORD') : $defaultPass;
            $charset = 'utf8mb4';

            $dsn = "mysql:host={$host};dbname={$dbname};charset={$charset}";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            try {
                self::$instance = new PDO($dsn, $user, $pass, $options);
            } catch (PDOException $e) {
                die("Database Connection Error: " . htmlspecialchars($e->getMessage()));
            }
        }

        return self::$instance;
    }
}

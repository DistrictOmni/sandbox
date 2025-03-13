<?php

namespace App\Core;

use Illuminate\Database\Capsule\Manager as Capsule;
use Exception;

class Database
{
    private static Capsule $capsule;

    public static function init($logger): void
    {
        try {
            // Required environment variables *except* DB_PASSWORD
            $requiredEnvVars = ['DB_DRIVER', 'DB_HOST', 'DB_DATABASE', 'DB_USERNAME'];

            // Check each variable for existence & non-empty
            foreach ($requiredEnvVars as $var) {
                if (!isset($_ENV[$var]) || $_ENV[$var] === '') {
                    throw new Exception("Missing required environment variable: {$var}");
                }
            }

            $logger->debug("Initializing database connection...");

            // Initialize Capsule
            self::$capsule = new Capsule;

            // Use DB_PASSWORD if set; default to '' if not
            $dbPassword = $_ENV['DB_PASSWORD'] ?? '';

            self::$capsule->addConnection([
                'driver'    => $_ENV['DB_DRIVER'],
                'host'      => $_ENV['DB_HOST'],
                'database'  => $_ENV['DB_DATABASE'],
                'username'  => $_ENV['DB_USERNAME'],
                'password'  => $dbPassword,    // Accept empty or actual password
                'charset'   => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'prefix'    => '',
            ]);

            // Make Capsule globally available
            self::$capsule->setAsGlobal();
            self::$capsule->bootEloquent();

            $logger->debug("Database connection initialized successfully.");
        } catch (Exception $e) {
            $logger->error("Database initialization failed: " . $e->getMessage());
            exit("Critical Error: Database connection failed. Check logs for details.");
        }
    }
}
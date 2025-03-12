<?php

namespace App\Core;

use Dotenv\Dotenv;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Exception;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;

class Application
{
    /**
     * @var Router
     */
    private Router $router;

    /**
     * @var Logger
     */
    private Logger $logger;

    public function __construct()
    {
        try {
            // Initialize logger first for early debugging
            $this->initLogger();
            $this->logger->debug("Logger initialized.");

            // Load environment variables (.env file)
            $this->logger->debug("Loading environment variables...");
            $this->loadEnv();
            $this->logger->debug("Environment variables loaded successfully.");

            // Configure global settings
            $this->logger->debug("Configuring global settings...");
            $this->configureSettings();
            $this->logger->debug("Global settings configured successfully.");

             // Initialize database
            Database::init($this->logger);

            // Initialize router
            $this->logger->debug("Initializing router...");
            $this->router = new Router($this->logger);
            $this->logger->debug("Router initialized successfully.");

            // Bootstrap the application
            $this->logger->debug("Bootstrapping the application...");
            Bootstrap::init($this->logger);
            $this->logger->debug("Bootstrap process completed.");

            // Register module routes
            $this->logger->debug("Registering module routes...");
            $this->registerModuleRoutes();
            $this->logger->debug("Module routes registered successfully.");
        } catch (Exception $e) {
            $this->logger->error("Application initialization failed: " . $e->getMessage());
            exit("Critical Error: Unable to initialize application. Check logs for details.");
        }
    }

    /**
     * Load environment variables using vlucas/phpdotenv
     */
    private function loadEnv(): void
    {
        $projectRoot = dirname(__DIR__, 2);
        $envFile = $this->findEnvFile($projectRoot);

        if ($envFile) {
            try {
                $dotenv = Dotenv::createImmutable(dirname($envFile));
                $dotenv->load();
                $this->logger->debug("Environment variables loaded from: " . $envFile);

                // Check for required keys
                $requiredKeys = ['APP_TIMEZONE', 'APP_DEBUG'];
                foreach ($requiredKeys as $key) {
                    if (!isset($_ENV[$key])) {
                        throw new Exception("Missing required environment variable: " . $key);
                    }
                }
            } catch (Exception $e) {
                $this->logger->error("Failed to load environment variables: " . $e->getMessage());
                exit("Critical Error: Failed to load environment variables. Check logs for details.");
            }
        } else {
            $this->logger->error("No .env file found in the project directory.");
            exit("Critical Error: No .env file found. Check logs for details.");
        }
    }

    private function findEnvFile(string $directory): ?string
    {
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
        foreach ($iterator as $file) {
            if ($file->isFile() && $file->getFilename() === '.env') {
                return $file->getPathname();
            }
        }
        return null;
    }

    /**
     * Configure app settings (timezone, error reporting, etc.)
     */
    private function configureSettings(): void
    {
        try {
            date_default_timezone_set($_ENV['APP_TIMEZONE'] ?? 'UTC');
            ini_set('display_errors', $_ENV['APP_DEBUG'] ?? 0);
            $this->logger->debug("Timezone set to: " . date_default_timezone_get());
            $this->logger->debug("Display errors setting: " . ini_get('display_errors'));
        } catch (Exception $e) {
            $this->logger->error("Failed to configure settings: " . $e->getMessage());
        }
    }

    /**
     * Initialize a global logger (Monolog)
     */
    private function initLogger(): void
    {
        try {
            $this->logger = new Logger('district_omni');
            $logFile = __DIR__ . '/../../storage/logs/app.log';
            $this->logger->pushHandler(new StreamHandler($logFile, Logger::DEBUG));
            $this->logger->debug("Logger initialized successfully.");
        } catch (Exception $e) {
            error_log("Critical Error: Failed to initialize logger. " . $e->getMessage());
            exit("Critical Error: Failed to initialize logger.");
        }
    }

  /**
 * Register module routes by scanning all subdirectories in /Modules
 */
private function registerModuleRoutes(): void
{
    try {
        // Points to your /Modules folder
        $modulesPath = dirname(__DIR__, 1) . '/Modules';

        $this->router->collectRoutes($modulesPath);

        $this->logger->debug("Module routes registered successfully via auto-discovery.");
    } catch (Exception $e) {
        $this->logger->error("Failed to register module routes: " . $e->getMessage());
    }
}

    /**
     * Dispatch the request through the router.
     */
    public function run(): void
    {
        try {
            // Log incoming request details
            $this->logger->debug("Incoming request: ", [
                'method' => $_SERVER['REQUEST_METHOD'],
                'uri' => $_SERVER['REQUEST_URI'],
                'params' => $_REQUEST
            ]);

            // Dispatch the request
            $this->router->dispatch();

            $this->logger->debug("Request dispatched successfully.");
        } catch (Exception $e) {
            $this->logger->error("Request handling failed: " . $e->getMessage());
            http_response_code(500);
            echo "Internal Server Error.";
        }
    }
}

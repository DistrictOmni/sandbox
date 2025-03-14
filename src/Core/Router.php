<?php

namespace App\Core;

use FastRoute\RouteCollector;
use FastRoute\Dispatcher;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use Exception;

use function FastRoute\simpleDispatcher;

class Router
{
    protected $logger;
    protected array $routeClosures = [];
    protected ?Dispatcher $dispatcher = null;

    public function __construct($logger)
    {
        $this->logger = $logger;
        $this->logger->debug("Router initialized.");
    }

    /**
     * Collect all route closures from any 'routes.php' file under $modulesPath.
     */
    public function collectRoutes(string $modulesPath): void
    {
        $this->logger->debug("Collecting route definitions from: {$modulesPath}");

        try {
            $dirIterator = new RecursiveDirectoryIterator($modulesPath);
            $iterator = new RecursiveIteratorIterator($dirIterator);

            // Look for all 'routes.php' files
            foreach ($iterator as $file) {
                if ($file->isFile() && $file->getFilename() === 'routes.php') {
                    $this->logger->debug("Found routes file: " . $file->getPathname());

                    // Each routes.php MUST return a Closure that takes RouteCollector
                    $closure = require $file->getPathname();

                    // Verify we got a callable closure
                    if (is_callable($closure)) {
                        $this->routeClosures[] = $closure;
                    } else {
                        $this->logger->warning(
                            "Route file does not return a callable: " . $file->getPathname()
                        );
                    }
                }
            }

            // Build the FastRoute dispatcher from all discovered closures
            $this->buildDispatcher();
        } catch (Exception $e) {
            $this->logger->error("Failed to collect routes: " . $e->getMessage());
        }
    }

    /**
     * Build the FastRoute dispatcher using all discovered route closures.
     */
    private function buildDispatcher(): void
    {
        $this->dispatcher = simpleDispatcher(function (RouteCollector $r) {
            foreach ($this->routeClosures as $closure) {
                // Pass the collector to each closure
                $closure($r);
            }
        });

        $this->logger->debug("FastRoute dispatcher built successfully.");
    }

    /**
     * Dispatch the current request using FastRoute.
     */
    public function dispatch(): void
    {
        try {
            $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
            $uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';
            $uri = rtrim($uri, '/') ?: '/';

            // Log incoming request
            $this->logger->debug("Dispatching request: ", [
                'method' => $method,
                'uri'    => $uri,
                'params' => $_REQUEST
            ]);

            // Use the FastRoute dispatcher
            $routeInfo = $this->dispatcher->dispatch($method, $uri);

            switch ($routeInfo[0]) {
                case Dispatcher::NOT_FOUND:
                    $this->logger->warning("No route found for: {$method} {$uri}");
                    http_response_code(404);
                    echo "404 - Not Found";
                    break;

                case Dispatcher::METHOD_NOT_ALLOWED:
                    $allowedMethods = $routeInfo[1];
                    $this->logger->warning(
                        "Method not allowed for: {$method} {$uri}. Allowed: " . implode(', ', $allowedMethods)
                    );
                    http_response_code(405);
                    echo "405 - Method Not Allowed";
                    break;

                case Dispatcher::FOUND:
                    $handler = $routeInfo[1];
                    $vars = $routeInfo[2];

                    $this->logger->debug("Matched route: {$method} {$uri}");

                    if (is_callable($handler)) {
                        // Call the route's callable with parameters
                        call_user_func_array($handler, $vars);
                    } else {
                        $this->logger->error("Handler for route is not callable: {$method} {$uri}");
                        http_response_code(500);
                        echo "500 - Internal Server Error";
                    }
                    break;
            }
        } catch (Exception $e) {
            // Log any errors during dispatch
            $this->logger->error("Router dispatch failed: " . $e->getMessage());
            http_response_code(500);
            echo "500 - Internal Server Error";
        }
    }
    public static function render(
        string $view,
        string $layout = 'layout-auth',
        array $data = []
    ): void {
        // Extract $data array so the keys become variables in the view
        extract($data);
    
        // Capture the view output
        ob_start();
        // Adjust path to your actual view directory
        include __DIR__ . '/' . $view . '.php'; // Adjust the path as necessary
        $content = ob_get_clean();
    
        // Now load the chosen layout, injecting the $content
        include __DIR__ . '/Layouts/' . $layout . '.php'; // Adjust the path as necessary
    }
    
    
}

<?php

namespace App\Core;
/**
 * Bootstrap File
 * /Core/Bootstrap.php
 * 
 * Check IF First App Launch/Run on Server
 * Get configuration
 * Load functions
 * Date format & Time zone
 * Start Session
 * Sanitize $_REQUEST array
 * Internationalization
 * Modules & Plugins
 * Update RosarioSIS
 * Warehouse() function (Output HTML header (including Bottom & Side menus), or footer)
 * isAJAX() function (AJAX request detection)
 * ETagCache() function (ETag cache system)
 *
 * 
 * @package DistrictOmni SIS
 */
use Exception;

class Bootstrap
{
    public static function init($logger): void
    {
        try {
            $logger->debug("Bootstrap: Starting initialization...");

            // 1. Check if first app launch
            $logger->debug("Checking if this is the first application launch...");
            self::checkFirstLaunch($logger);
            $logger->debug("First launch check completed.");

            // 2. Start session
            $logger->debug("Starting session...");
            self::startSession();
            $logger->debug("Session started successfully.");

            // 3. Sanitize request data
            $logger->debug("Sanitizing request data...");
            self::sanitizeRequest();
            $logger->debug("Request data sanitized.");

            // 4. Initialize internationalization (i18n)
            $logger->debug("Initializing internationalization settings...");
            self::initializeInternationalization();
            $logger->debug("Internationalization initialized successfully.");

            // 5. Check for updates
            $logger->debug("Checking for updates...");
            self::checkUpdates();
            $logger->debug("Update check completed.");

            // 6. Load modules and plugins (if applicable)
            $logger->debug("Loading modules and plugins (if any)...");
            // You can add module/plugin loading logic here.
            $logger->debug("Module/plugin loading completed.");

            $logger->debug("Bootstrap process completed successfully.");
        } catch (Exception $e) {
            $logger->error("Bootstrap failed: " . $e->getMessage());
            exit("Critical Error: Bootstrap process failed. Check logs for details.");
        }
    }

    private static function checkFirstLaunch($logger): void
    {
        try {
            // Example: Check if essential files exist (such as .env or config.php)
            if (!file_exists(dirname(__DIR__, 1) . '/.env')) {
                $logger->warning("First Launch: Missing .env file. Application might not be configured.");
            } else {
                $logger->debug("First Launch: .env file detected.");
            }

            // Further checks can be added (e.g., database connectivity, necessary tables, etc.)
        } catch (Exception $e) {
            $logger->error("First Launch Check failed: " . $e->getMessage());
        }
    }

    private static function startSession(): void
    {
        try {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
        } catch (Exception $e) {
            error_log("Session start failed: " . $e->getMessage());
        }
    }

    private static function sanitizeRequest(): void
    {
        try {
            array_walk_recursive($_REQUEST, function (&$value) {
                $value = strip_tags($value);
            });
        } catch (Exception $e) {
            error_log("Request sanitization failed: " . $e->getMessage());
        }
    }

    private static function initializeInternationalization(): void
    {
        try {
            // Example: Set locale (Modify as per your project needs)
            setlocale(LC_ALL, $_ENV['APP_LOCALE'] ?? 'en_US.UTF-8');
        } catch (Exception $e) {
            error_log("Internationalization initialization failed: " . $e->getMessage());
        }
    }

    private static function checkUpdates(): void
    {
        try {
            // Example: Check for software updates (Replace with actual update logic)
            $latestVersion = '1.0.0'; // Placeholder
            $currentVersion = $_ENV['APP_VERSION'] ?? '1.0.0';

            if (version_compare($currentVersion, $latestVersion, '<')) {
                error_log("New update available: $latestVersion. Current version: $currentVersion");
            }
        } catch (Exception $e) {
            error_log("Update check failed: " . $e->getMessage());
        }
    }

    // ----------------------------------------------------------------------------
    // Example: Global helper functions (Warehouse, isAJAX, ETagCache)
    // ----------------------------------------------------------------------------

    public static function warehouse($content, $type = 'header')
    {
        try {
            if ($type === 'header') {
                // Output HTML header, including bottom & side menus, etc.
                echo "<!DOCTYPE html>\n<html>\n<head>\n<title>DistrictOmni SIS</title>\n</head>\n<body>\n";
                echo "<nav>...</nav>"; // side menus, top bar, etc.
                echo $content;
            } else {
                // Output footer
                echo $content;
                echo "\n</body>\n</html>";
            }
        } catch (Exception $e) {
            error_log("Warehouse function failed: " . $e->getMessage());
        }
    }

    public static function isAJAX(): bool
    {
        try {
            return (
                !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
                strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'
            );
        } catch (Exception $e) {
            error_log("AJAX request detection failed: " . $e->getMessage());
            return false;
        }
    }

    public static function eTagCache($etagString): bool
    {
        try {
            // Example ETag caching logic:
            $etag = md5($etagString);
            header("Etag: $etag");

            if (
                isset($_SERVER['HTTP_IF_NONE_MATCH']) &&
                $_SERVER['HTTP_IF_NONE_MATCH'] === $etag
            ) {
                // ETag match, send 304 Not Modified
                header("HTTP/1.1 304 Not Modified");
                return true;
            }

            return false;
        } catch (Exception $e) {
            error_log("ETag caching failed: " . $e->getMessage());
            return false;
        }
    }
}

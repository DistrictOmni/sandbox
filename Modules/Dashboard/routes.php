<?php

use FastRoute\RouteCollector;

return function (RouteCollector $r) {
    // GET /
    $r->addRoute('GET', '/', function () {
        if (isset($_SESSION['user_id'])) {
            header('Location: /dashboard');
        } else {
            header('Location: /auth/login');
        }
        exit;
    });

    // GET /dashboard
    $r->addRoute('GET', '/dashboard', function () {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /auth/login');
            exit;
        }
        echo "Welcome to your Dashboard!";
    });
};

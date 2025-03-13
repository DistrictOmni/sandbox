<?php


use FastRoute\RouteCollector;

return function (RouteCollector $r) {

    
    // Example login route
    $r->addRoute('GET', '/auth/login', function () {
        echo "Login Page (please log in)";
    });
    
    // Example login POST route
    $r->addRoute('POST', '/auth/login', function () {
        // Validate user credentials...
        // If valid, do: $_SESSION['user_id'] = $userID;
        // Then redirect to dashboard
        header('Location: /dashboard');
        exit;
    });
    $r->addRoute('GET', '/logout', function () {
        echo "Logout Action";
    });
};

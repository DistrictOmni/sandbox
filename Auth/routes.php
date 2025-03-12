<?php

use FastRoute\RouteCollector;

return function (RouteCollector $r) {
    // Define Auth module routes here
    $r->addRoute('GET', '/auth/login', function () {
        echo "Login Page";
    });

    $r->addRoute('POST', '/login', function () {
        echo "Process Login";
    });

    $r->addRoute('GET', '/logout', function () {
        echo "Logout Action";
    });
};

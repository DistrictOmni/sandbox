
<?php
use FastRoute\RouteCollector;
use App\Core\Router;

return function (RouteCollector $r) {
    // Example route
    $r->addRoute('GET', '/dashboard', function () {
        // ...
        Router::render('../Modules/Dashboard/Views/Dashboard', 'GlobalLayout');
    });
    // Example route
    $r->addRoute('GET', '/', function () {
        // ...
        Router::render('../Modules/Dashboard/Views/Dashboard', 'GlobalLayout');
    });
};

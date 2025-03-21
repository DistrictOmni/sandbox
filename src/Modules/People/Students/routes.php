<?php

use FastRoute\RouteCollector;
use App\Core\Router;

return function (RouteCollector $r) {
    // Route for Student Profile Overview (without a specific student ID)
    $r->addRoute('GET', '/people/student/view', function () {
        // No studentId here, so no need to pass it
        Router::render(
            '../Modules/People/Students/Views/StudentProfile/StudentProfileViews/StudentProfile/QuickPeek',
            'StudentProfileLayout',
            [
                'studentView' => 'StudentProfileViews/StudentProfile/QuickPeek', // Ensure this path is correct
            ]
        );
    });

    // Route for Quick Peek (with student ID)
    $r->addRoute('GET', '/people/student/view/{id}/quick-peek', function ($args) {
        $studentId = $args['id'];
        Router::render('StudentProfileViews/StudentProfile/QuickPeek', 'GlobalLayout', [
            'studentView' => 'StudentProfileViews/QuickPeek.php',
            'studentId' => $studentId,
        ]);
    });

    // Route for Demographics (with student ID)
    $r->addRoute('GET', '/people/student/view/{id}/demographics', function ($args) {
        $studentId = $args['id'];
        Router::render('StudentProfile/StudentProfileLayout', 'GlobalLayout', [
            'studentView' => 'StudentProfileViews/Demographics.php',
            'studentId' => $studentId,
        ]);
    });

    // Add more routes as needed...
};

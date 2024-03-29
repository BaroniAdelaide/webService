<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get("/quizzes", "QuizController::get");
$routes->get("/quiz/(:num)", "QuizController::get/$1");

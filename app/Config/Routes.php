<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get("quizzes", "QuizController::get");
$routes->get("quiz/(:num)", "QuizController::get/$1");
//create
$routes->post("quiz", "QuizController::create");
//put (punteggio, nome, descrizione)
$routes->put("quiz", "QuizController::put");
//delete
$routes->delete("quiz/(:num)", "QuizController::delete/$1");


//domande
//read
$routes->get("domande", "DomandaController::get");
$routes->get("domanda/(:num)", "DomandaController::get/$1");
//create
$routes->post("domanda", "DomandaController::create");
//put (domanda, punti)
$routes->put("domanda", "DomandaController::put");
//delete
$routes->delete("domanda/(:num)", "DomandaController::delete/$1");

//risposte
//read
$routes->get("risposte", "RispostaController::get");
$routes->get("risposta/(:num)", "RispostaController::get/$1");
//create
$routes->post("risposta", "RispostaController::create");
//put
$routes->put("risposta", "RispostaController::put");
//delete
$routes->delete("risposta/(:num)", "RispostaController::delete/$1");


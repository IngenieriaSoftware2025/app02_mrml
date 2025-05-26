<?php 
require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AppController;
use Controllers\ClientesController;

$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);

//RutasPrincipales
$router->get('/', [AppController::class,'index']);

// Vistas
$router->get('/clientes', [ClientesController::class, 'renderizarPagina']);

//Clientes - API (CORREGIDAS)
$router->post('/clientes/guardarAPI', [ClientesController::class, 'guardarAPI']);
$router->get('/clientes/buscarAPI', [ClientesController::class, 'buscarAPI']);
$router->post('/clientes/modificarAPI', [ClientesController::class, 'modificarAPI']);
$router->get('/clientes/EliminarAPI', [ClientesController::class, 'EliminarAPI']);

// Comprueba y valida las rutas
$router->comprobarRutas();
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('listar_libros', 'Libros::index');
$routes->post('guardar_libro', 'Libros::guardarLibro');

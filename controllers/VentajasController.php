<?php

namespace Controllers;

use MVC\Router;

class VentajasController {
    public static function index (Router $router) {

        $router->render('admin/ventajas/index', [
            'titulo' => 'Regalos y ventajas'
        ]);
    }
}
<?php

namespace Controllers;

use MVC\Router;

class PonentesController {
    public static function index (Router $router) {

        $router->render('admin/ponentes/index', [
            'titulo' => 'Ponentes'
        ]);
    }
    public static function crear (Router $router) {
        $alertas = [];

        $router->render('admin/ponentes/crear', [
            'titulo' => 'Inscribe un Ponente',
            'alertas' => $alertas
        ]);
    }
}
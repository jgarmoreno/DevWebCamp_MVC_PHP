<?php

namespace Controllers;

use MVC\Router;

class VentajasController {
    public static function index (Router $router) {
        if(!is_admin()) {
            header('Location: /');
            return;
        }

        $router->render('admin/ventajas/index', [
            'titulo' => 'Regalos y ventajas'
        ]);
    }
}
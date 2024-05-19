<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;
use Model\Registro;

class DashboardController {
    public static function index (Router $router) {

        $router->render('admin/dashboard/index', [
            'titulo' => 'Panel de administración'
        ]);
    }
}
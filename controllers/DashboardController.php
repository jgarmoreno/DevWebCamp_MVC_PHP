<?php

namespace Controllers;

use Model\Evento;
use Model\Ponente;
use MVC\Router;
use Model\Usuario;
use Model\Registro;

class DashboardController {
    public static function index (Router $router) {
        if(!is_admin()) {
            header('Location: /');
            return;
        }
        // Obtener últimos registros
        $registros = Registro::get(5);
        foreach($registros as $registro) {
            $registro->usuario = Usuario::find($registro->usuario_id);
        }
        // Total de registros
        $registrosTotal = Registro::total();
        // Total de usuarios
        $usuariosTotal = Usuario::total();

        // Total de eventos
        $eventos = Evento::total();
        
        // Total de ponentes
        $ponentes = Ponente::total();

        // Calcular ingresos
        $virtuales = Registro::total('plan_id', 2);
        $presenciales = Registro::total('plan_id', 1);
        $ingresos = ($presenciales * 67.27) + ($virtuales * 38.29);

        // Calcular eventos agotados
        $eventos_agotados = Evento::where_array('disponibles', 0);
        $total_agotados = Evento::total('disponibles', 0);

        // Calcular eventos en riesgo
        $eventos_en_riesgo = Evento::ordenarLimiteAgotado('disponibles', 'ASC', 5);
        $riesgo_total = Evento::whereCondSeg('disponibles', '>', '<=', '0', '10');

        // Calcular eventos a promocionar (aforo >= 25)
        $eventos_publicitar = Evento::ordenarLimiteAgotado('disponibles', 'DESC', 5);
        $total_publicitar = Evento::whereCont('disponibles', '>=', 25);

        $router->render('admin/dashboard/index', [
            'titulo' => 'Panel de administración',
            'registros' => $registros,
            'usuariosTotal' => $usuariosTotal,
            'ingresos' => $ingresos,
            'registrosTotal' => $registrosTotal,
            'eventos' => $eventos,
            'ponentes' => $ponentes,
            'eventos_agotados' => $eventos_agotados,
            'total_agotados' => $total_agotados,
            'eventos_en_riesgo' => $eventos_en_riesgo,
            'riesgo_total' => $riesgo_total,
            'eventos_publicitar' => $eventos_publicitar,
            'total_publicitar' => $total_publicitar
        ]);
    }
}
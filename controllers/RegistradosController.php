<?php

namespace Controllers;

use Model\Dia;
use Model\Hora;
use Model\Plan;
use MVC\Router;
use Model\Evento;
use Model\Ponente;
use Model\Usuario;
use Model\Registro;
use Model\Categoria;
use Classes\Paginacion;

class RegistradosController {
    public static function index (Router $router) {
        if(!is_admin()) {
            header('Location: /login');
            return;
        }
        // Paginación
        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
        if(!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/registrados?page=1');
        }
        $registros_por_pagina = 5;
        $total_registros = Registro::total();

        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total_registros);

        if($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/registrados?page=1');
        }
      
        $registros = Registro::paginar($registros_por_pagina, $paginacion->offset());
        foreach($registros as $registro) {
            $registro->usuario = Usuario::find($registro->usuario_id);
            $registro->plan = Plan::find($registro->plan_id);
        }

        // Eventos
        $eventos = Evento::ordenar('hora_id', 'ASC');
        

        $eventos_formateados = [];
        foreach($eventos as $evento) {
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponente::find($evento->ponente_id);

            if($evento->dia_id === "1" && $evento->categoria_id === "1") {
                $eventos_formateados['conferencias_v'][] = $evento;
            }
            if($evento->dia_id === "2" && $evento->categoria_id === "1") {
                $eventos_formateados['conferencias_s'][] = $evento;
            }
            if($evento->dia_id === "1" && $evento->categoria_id === "2") {
                $eventos_formateados['workshops_v'][] = $evento;
            }
            if($evento->dia_id === "2" && $evento->categoria_id === "2") {
                $eventos_formateados['workshops_s'][] = $evento;
            }
            
        }



        $router->render('admin/registrados/index', [
            'titulo' => 'Usuarios inscritos',
            'registros' => $registros,
            'paginacion' => $paginacion->paginacion(),
            'eventos' => $eventos_formateados
        ]);
    }
}
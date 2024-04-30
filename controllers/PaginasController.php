<?php

namespace Controllers;
use Model\Dia;
use Model\Hora;
use MVC\Router;
use Model\Evento;
use Model\Ponente;
use Model\Categoria;

class PaginasController {
    public static function index(Router $router) {
    

        $router->render('paginas/index', [
            'titulo' => 'Inicio'
        ]);
    }
    
    public static function evento(Router $router) {
    

        $router->render('paginas/devwebcamp', [
            'titulo' => 'Sobre DevWebCamp'
        ]);
    }

    public static function planes(Router $router) {
    

        $router->render('paginas/planes', [
            'titulo' => 'Planes de suscripción'
        ]);
    }

    public static function conferencias(Router $router) {
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


        $router->render('paginas/conferencias', [
            'titulo' => 'Conferencias y Talleres',
            'eventos' => $eventos_formateados
        ]);
    }

}
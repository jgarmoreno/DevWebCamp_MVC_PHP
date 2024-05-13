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

class RegistroController {
    public static function crear(Router $router) {
        if(!is_auth()) {
            header('Location: /');
        }

        // Verificar si ya está registrado
        $registro = Registro::where('usuario_id', $_SESSION['id']);

        if(isset($registro) && $registro->plan_id === '3') {
            header('Location: /entrada?id=' . urlencode($registro->token));
        }

        $router->render('registro/crear', [
            'titulo' => 'Finaliza el registro'
        ]);
    }
    public static function gratis(Router $router) {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_auth()) {
                header('Location: /login');
            }

             // Verificar si ya está registrado
            $registro = Registro::where('usuario_id', $_SESSION['id']);

            if(isset($registro) && $registro->plan_id === '3') {
                header('Location: /entrada?id=' . urlencode($registro->token));
            }

            $token = substr(md5(uniqid(rand(), true)), 0, 8); //Substring corta el string (Lo que le pasas, el inicio donde empieza a contar, el número respecto al inicio donde corta el string)
            
            // Crear registro
            $datos = array(
                'plan_id' => 3,
                'pago_id' => '',
                'token' => $token,
                'usuario_id' => $_SESSION['id']
            );

            $registro = new Registro($datos);
            $resultado = $registro->guardar();

            if($resultado) {
                header('Location: /entrada?id=' . urlencode($registro->token));
            }
        
        }
    }
    public static function boletos(Router $router) {
        // Validar la URL
        $id = $_GET['id'];

        if($id || strlen($id === 8)) {
            // Buscar en la BD
            $registro = Registro::where('token', $id);
            if(!$registro) {
                header('Location: /');
            }
            // Llenar las tablas de referencia
            $registro->usuario = Usuario::find($registro->usuario_id);
            $registro->plan = Plan::find($registro->plan_id);
        } else {
            header('Location: /registro');
        }

        $router->render('registro/boletos', [
            'titulo' => 'Entrada adquirida',
            'registro' => $registro
        ]);
    }

    public static function pagar(Router $router) {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_auth()) {
                header('Location: /login');
            }

            // Validar que el post no venga vacio
            if(empty($_POST)) {
                echo json_encode([]);
                return;
            }

            // Crear registro
            $datos = $_POST;
            $datos['token'] = substr(md5(uniqid(rand(), true)), 0, 8);
            $datos['usuario_id'] = $_SESSION['id'];



            try {
                $registro = new Registro($datos);
                $resultado = $registro->guardar();
                echo json_encode($resultado);
            } catch (\Throwable $th) {
                echo json_encode([
                    'resultado' => 'error'
                ]);
            }
        
        }
    }

    public static function conferencias(Router $router) {
        if(!is_auth()) {
            header('Location: /login');
        }

        // Validar que el usuario tenga el plan presencial 
        $usuario_id = $_SESSION['id'];
        $registro = Registro::where('usuario_id', $usuario_id);

        if($registro->plan_id !== "1") {
            header('Location: /login');
        }

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


        $router->render('registro/conferencias', [
            'titulo' => 'Reservar talleres y conferencias',
            'eventos' => $eventos_formateados
        ]);
    }
}
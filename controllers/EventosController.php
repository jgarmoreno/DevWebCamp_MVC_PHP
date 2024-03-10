<?php

namespace Controllers;

use Model\Dia;
use Model\Hora;
use MVC\Router;
use Model\Evento;
use Model\Categoria;
use Intervention\Image\ImageManagerStatic as Image;

class EventosController {
    public static function index (Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }

        $router->render('admin/eventos/index', [
            'titulo' => 'Eventos y talleres'
        ]);
    }

    public static function crear (Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }
        $alertas = [];

        $categorias = Categoria::all('ASC');
        $dias = Dia::all('ASC');
        $horas = Hora::all('ASC');
        $evento = new Evento;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /login');
            }
             // Leer imagen
             if(!empty($_FILES['imagen']['tmp_name'])) {
                
                $carpeta_imagenes = '../public/images/eventos';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }

                // Crear y transformar la imagen a un size, formato y optimización
                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp', 80);

                // Setear un nombre aleatorio y asignarselo al post
                $nombre_imagen = md5(uniqid(rand(), true));
                $_POST['imagen'] = $nombre_imagen;
            }

            // Sincroniza los datos escritos al Post
            $evento -> sincronizar($_POST);

            // Validar formulario
            $alertas = $evento->validarEvento();

            if(empty($alertas)) {
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");
                $resultado = $evento->guardar();
                if($resultado) {
                    header('Location: /admin/eventos');
                }
            }
        }

        $router->render('admin/eventos/crear', [
            'titulo' => 'Añade un nuevo evento',
            'alertas' => $alertas,
            'categorias' => $categorias,
            'dias' => $dias,
            'horas' => $horas,
            'evento' => $evento
        ]);
    }

    public static function editar (Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }
        $alertas = [];
        $evento = new Evento;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /login');
            }
        $evento->imagen_actual = $evento->imagen;
        
        }
        $router->render('admin/eventos/editar', [
            'titulo' => 'Actualizar evento',
            'alertas' => $alertas
        ]);
    }

    public static function eliminar () {


    }
}
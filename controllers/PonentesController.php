<?php

namespace Controllers;

use MVC\Router;
use Model\Ponente;
use Intervention\Image\ImageManagerStatic as Image;

class PonentesController {
    public static function index (Router $router) {
        $ponentes = Ponente::all();


        $router->render('admin/ponentes/index', [
            'titulo' => 'Ponentes',
            'ponentes' => $ponentes
        ]);
    }
    public static function crear (Router $router) {
        $alertas = [];
        $ponente = new Ponente;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Leer imagen
            if(!empty($_FILES['imagen']['tmp_name'])) {
                
                $carpeta_imagenes = '../public/images/speakers';

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
            // Convertir a string el array de redes sociales, escapando unas diagonales que salen en el encode, ya que la sincronización (abajo) solo funciona con strings
            $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);

            // Sincroniza los datos escritos al Post
            $ponente -> sincronizar($_POST);
            

            // Validar datos formulario
            $alertas = $ponente->validar();

            // Guardar el registro
            if(empty($alertas)) {
                // Guardar las imagenes
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");

                // Guardar en la BD
                $resultado = $ponente->guardar();
                if($resultado) {
                    header('Location: /admin/ponentes');
                }
            } else {

            }
        }

        $router->render('admin/ponentes/crear', [
            'titulo' => 'Inscribe un Ponente',
            'alertas' => $alertas,
            'ponente' => $ponente,
            'redes' => json_decode($ponente->redes)
        ]);
    }

    public static function editar (Router $router) {
        $alertas = [];
        // Validar el id
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: /admin/ponentes');
        }
        // Obtener ponente a través del id
        $ponente = Ponente::find($id);

        if(!$ponente) {
            header('Location: /admin/ponentes'); 
        }

        $ponente->imagen_actual = $ponente->imagen;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Leer imagen
                if(!empty($_FILES['imagen']['tmp_name'])) {
                    
                    $carpeta_imagenes = '../public/images/speakers';
    
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
                } else {
                    $_POST['imagen'] = $ponente->imagen_actual;
                }

                // Convertir a string el array de redes sociales, escapando unas diagonales que salen en el encode, ya que la sincronización (abajo) solo funciona con strings
                $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);
                $ponente->sincronizar($_POST);

                $alertas = $ponente->validar();

                if(empty($alertas)) {
                    if(isset($nombre_imagen)) {
                        // Guardar las imagenes
                        $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                        $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");
                    }
                    $resultado = $ponente->guardar();
                    if($resultado) {
                        header('Location: /admin/ponentes');
                    }
                }
        }

        $router->render('admin/ponentes/editar', [
            'titulo' => 'Edita un ponente',
            'alertas' => $alertas,
            'ponente' => $ponente,
            'redes' => json_decode($ponente->redes)
        ]);
    }
}
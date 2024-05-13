<?php

namespace Model;

class Plan extends ActiveRecord {
    protected static $tabla = 'planes';
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;
}
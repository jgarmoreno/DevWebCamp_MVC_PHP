<?php

namespace Model;

class Registro extends ActiveRecord {
    protected static $tabla = 'registros';
    protected static $columnasDB = ['id', 'plan_id', 'pago_id', 'token', 'usuario_id', 'regalo_id'];

    public $id;
    public $plan_id;
    public $pago_id;
    public $token;
    public $usuario_id;
    public $regalo_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->plan_id = $args['plan_id'] ?? '';
        $this->pago_id = $args['pago_id'] ?? '';
        $this->token = $args['token'] ?? '';
        $this->usuario_id = $args['usuario_id'] ?? '';
        $this->regalo_id = $args['regalo_id'] ?? null;
    }
}
<?php namespace app\Models;
use app\Config\DB;

class UsuariosModel {
  private $conexion;

  public function __construct() {
    $this->conexion = (class_exists('app\Config\DB')) ? new DB() : null;
    $this->pdox = $this->conexion->pdox();

    return $this;
  }

  public function listall() {
    $records = $this->pdox->table('usuarios')
		->select('id_usuario, nombre, apellidos')
		->orderBy('id_usuario', 'desc')
		->limit(10)
		->getAll();

    return $records;
  }

  public function addUser($_data) {
    $data = [
      'nombre' => $_data['nombre'],
      'apellidos' => $_data['apellidos']
    ];
    $this->pdox->table('usuarios')->insert($data);

    return $this->pdox->insertId();
  }
}
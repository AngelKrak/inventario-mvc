<?php namespace app\Models;
use app\Config\DB;

class DirectoryModel {
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
		->limit(20)
		->getAll();

    return $records;
  }

  public function list() {
    return [
      [
        'id' => 1,
        'name' => 'new england'
      ],
      [
        'id' => 2,
        'name' => 'new jersey'
      ],
    ];
  }
}
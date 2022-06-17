<?php namespace app\Models;
use app\Config\DB;

class DirectoryModel {
  private $conexion;

  public function __construct() {
    $this->conexion = (class_exists('app\Config\DB')) ? new DB() : null;

    return $this;
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
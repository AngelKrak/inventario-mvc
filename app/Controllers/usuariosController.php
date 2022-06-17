<?php namespace app\Controllers;

use app\Models\UsuariosModel as Usuarios;
use app\Modules\View;
use app\Modules\Filter;

class UsuariosController {
  public function __construct() {
    $this->filter = new Filter();
    $this->usuarios = new Usuarios();
  }
	
	public function index(){
		return '<h1>Usuarios</h1>';
	}

  public function add() {
    $estado = null;
    if(!empty($_POST)) {
      $usuario = $this->usuarios->addUser([
        'nombre' => $this->filter->filterXSS($_POST['nombre'] ?? ''),
        'apellidos' => $this->filter->filterXSS($_POST['apellidos'] ?? '')
      ]);
      $estado = (!empty($usuario)) ? true : false;
    }

    return View::display('usuarios/AddUsuario', [
      'estado' => $estado
    ]);
  }

  public function list() {
    return View::display('ListUsuario');
  }
}
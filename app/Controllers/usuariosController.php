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
    if(!empty($_POST)) {
      $this->usuarios->addUser([
        'nombre' => $this->filter->filterXSS('Jose'),
        'apellidos' => $this->filter->filterXSS('Perez')
      ]);
    }

    return View::display('AddUsuario');
  }

  public function list() {
    return View::display('ListUsuario');
  }
}
<?php namespace app\Controllers;
use app\Modules\View;
use app\Modules\Filter;

class PanelController {
  public function __construct() {
    $this->filter = new Filter();
  }

	public function index(){
		return '<h1>Panel</h1>';
	}

  public function login() {
    return View::display('Login');
  }

  public function dashboard() {
    return '<h1>Dashboard</h1>';
  }
}
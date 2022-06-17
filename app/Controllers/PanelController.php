<?php namespace app\Controllers;

use app\Modules\View;

class PanelController {
	
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
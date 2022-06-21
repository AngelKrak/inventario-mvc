<?php namespace app\Controllers;
use app\Modules\View;
use app\Modules\Filter;

class HomeController {
	public function __construct() {
    $this->filter = new Filter();
  }

	public function index(){
		return '<h1>Home</h1>';
	}
}
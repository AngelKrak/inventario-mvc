<?php 
namespace app;

use app\Controllers\HomeController as Home;

$routes = [
  '/directory/home/id' => $Home.getId,
  '/directory/home/en' => $Home.getEn
];

class Routes 
{
  public function index()
  {
    global $routes;
    
    return $routes;
  }
}
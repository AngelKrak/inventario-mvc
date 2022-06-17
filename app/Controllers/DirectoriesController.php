<?php namespace app\Controllers;
// VERSION DE EJEMPLO - ELIMINAR CUANDO SEA NECESARIO.

use app\Models\DirectoryModel as Directory;
use app\Modules\View;
use app\Modules\Filter;

class DirectoriesController {
    public function __construct() {
        $this->filter = new Filter();
    }

	public function index(){
        $directory = new Directory();
        $list = $directory->list();
        $data = [
            'list' => $list
        ];

        return View::display('DirectoryList', $data);
    }
    
    /**
     * access using sample path /directories/detail/12
     * @param $params array
     */
    public function detail($params){
        if(empty($params) || !is_array($params)) return;

        $id = $this->filter->filterXSS($params[0] ?: '');
		return '<h1>Directories Detail of id : '.$id.'</h1>';
	}

    public function add () {
        return 'Hola, estoy para agregar informacion.';
    }
	
}
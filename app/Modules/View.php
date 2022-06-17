<?php namespace app\Modules;

class View 
{
    public static function display($view, $data = [])
    {
        $view = realpath(DIR_APP . 'Views/'.$view.'.php');

        if(is_file($view) === false || file_exists($view) === false) return http_response_code(404);

        //http://php.net/extract
        extract($data);

        //rendering view using output bufering
        ob_start();
        include($view);
        return ob_get_clean();
    }
}
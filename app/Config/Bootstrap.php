<?php namespace app\Config;

class Bootstrap 
{
	public static function run()
	{
		self::escapemagicquote();
		$target = self::getPath();
		if(!empty($target)) {
			$controller = self::_stripslashes_deep(htmlentities($target['controller'], ENT_QUOTES, "UTF-8"));
			$method = self::_stripslashes_deep(htmlentities($target['method'], ENT_QUOTES, "UTF-8"));
			$params = $target['params'];
			if($controller !== 'Base' && class_exists('\app\Controllers\\'.$controller.'Controller')) {
				if(method_exists('app\Controllers\\'.$controller.'Controller', $method)) {
					$_controller_namespace = '\app\Controllers\\'.$controller.'Controller';
					$_controller = new $_controller_namespace();
					echo call_user_func_array([$_controller, $method], [$params]);
				} else {
					// echo 'Page Not Found 404 : Method Not Found in Controller '.$controller; // Not show errors explicit
					return http_response_code(404);
				}
			} else {
				// echo 'Page Not Found 404 : Controller Not Found'; // Not show errors explicit
				return http_response_code(404);
			}
		} else {
			// read more at : http://php.net/manual/en/function.call-user-func.php
			$_controller_namespace = '\app\Controllers\HomeController';
			$_controller = new $_controller_namespace();
			echo call_user_func_array([$_controller], ['index']);	
		}
	}
	
	private static function getPath()
	{
		// php.net/manual/en/function.explode.php (split in js)
		$path = (!empty($_SERVER['PATH_INFO'])) ? explode('/', strip_tags(filter_input(INPUT_SERVER, 'PATH_INFO', FILTER_SANITIZE_URL))) : [];
		$params = [];
		// save params to array
		if(count($path) > 3) {
			for($n=3 ; $n < count($path) ; $n++) {
				array_push($params, $path[$n]);
			}	
		}
		
		return [
			'controller' => empty($path[1]) ? 'Home' : ucfirst($path[1]),
			'method' => empty($path[2]) ? 'index' : $path[2],
			'params' => $params
		];
	}

	protected function stripslashes_deep($value)
	{
		$value = is_array($value) ? array_map(function($obj){ return $this->stripslashes_deep($obj); }, $value) : stripslashes($value);
		return $value;
	}

	protected static function _stripslashes_deep($value) 
	{
		$value = is_array($value) ? array_map(function($obj){ return self::_stripslashes_deep($obj); }, $value) : stripslashes($value);
		return $value;
	}
    
	private static function escapemagicquote()
	{
		if(function_exists("get_magic_quotes_gpc") || (ini_get('magic_quotes_sybase') && (strtolower(ini_get('magic_quotes_sybase'))!="off"))){
			$_GET = json_decode(self::_stripslashes_deep(preg_replace('~\\\(?:0|a|b|f|n|r|t|v)~', '\\\$0', json_encode($_GET, JSON_HEX_APOS | JSON_HEX_QUOT))), true);
			$_POST = json_decode(self::_stripslashes_deep(preg_replace('~\\\(?:0|a|b|f|n|r|t|v)~', '\\\$0', json_encode($_POST, JSON_HEX_APOS | JSON_HEX_QUOT))), true);
			$_COOKIE = json_decode(self::_stripslashes_deep(preg_replace('~\\\(?:0|a|b|f|n|r|t|v)~', '\\\$0', json_encode($_COOKIE, JSON_HEX_APOS | JSON_HEX_QUOT))), true);
			$_REQUEST = json_decode(self::_stripslashes_deep(preg_replace('~\\\(?:0|a|b|f|n|r|t|v)~', '\\\$0', json_encode($_REQUEST, JSON_HEX_APOS | JSON_HEX_QUOT))), true);
		}
	}
}
<?php namespace app;
use app\Config\Bootstrap;

// error_reporting(E_ALL);

// global modules declaration
define('BASEDIR', realpath(__DIR__) ?? realpath(dirname(__FILE__)));
define('DIR_APP', BASEDIR . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR);
define('DIR_ASSETS', BASEDIR . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR);

// load app bootstrap
require realpath(__DIR__ . '/vendor/autoload.php');
require_once realpath(__DIR__ . '/app/Config/Bootstrap.php');
$bootstrap = new Bootstrap();
return $bootstrap::run();

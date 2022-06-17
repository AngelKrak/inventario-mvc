<?php namespace app\Config;

class DB {
  private $pdo;
  
  private $database = array(
    'host' => 'localhost',
    'dbname' => 'test',
    'username' => 'root',
    'password' => 'root'
  );

  public function __construct() {
    try {
      $this->pdo = new \PDO('mysql:host='.$this->database['host'].';dbname='.$this->database['dbname'].'', $this->database['username'], $this->database['password']);
      $this->pdo->exec("SET NAMES 'utf8mb4' COLLATE 'utf8mb4_general_ci'");
      $this->pdo->exec("SET CHARACTER SET 'utf8mb4'");
      $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
    } catch (\PDOException $e) {
      die('Cannot the connect to Database with PDO. ' . $e->getMessage());
    }

    return $this->pdo;
  }
}
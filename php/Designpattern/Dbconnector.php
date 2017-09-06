<?php

namespace Dbconnector;

/**
 *
 */
final class Singleton{

  private static $instance;
  public $db;

  public static function getInstance(){
    if(null === static::$instance){
      static::$instance=new Singleton();
    }
    return static::$instance;
  }
  private function __construct() {
    try {
    $this->db = new \PDO('mysql:host=localhost; dbname=phptest',
      'root',
      'a12345678');

      $this->db->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_WARNING);
      $this->db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE,\PDO::FETCH_OBJ);

    } catch (Exception $e) {
      $e->getMessage();
    }
  }
  private function __clone(){
  }
  private function __wakeup(){
  }
}

 ?>

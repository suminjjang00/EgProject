<?php
namespace extends_class;

use Abstract_class\Abstract_class;
require "./Abstract_class.php";
/**
 *
 */
class extends_class extends Abstract_class{

  protected $values = array();

  function __construct($values = array()){
    if($_SERVER['REQUEST_METHOD']==="POST"){
      $this ->values = $_POST;
    }else {
      // ??? why this $this is point to values??
      $this ->values = $values;
    }
  }
}

 ?>

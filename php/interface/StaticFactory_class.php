<?php
namespace StaticFactory_class;
require "./extends_class.php";

use extends_class\extends_class;

final class StaticFactory_class{

  public static function createFactory($type,$param=array()){

    if($type=='order'){
      return new extends_class($param);
    }elseif($type=='search'){
      return new extends_class($param);
    }
  }
}
?>

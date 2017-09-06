<?php

interface FormHelpedInterface {

  public function input($type,$attributes=array(),$isMultiple=false);
  public function encode($value);
  // public function select($options,$attributes);
  // public function textarea($options);
  public function tag($tag,$attributes,$isMultiple=false);
  // public function start($tag,$attributes=array(),$isMultiple=false);
  // public function end($tag);
  public function attributes($attributes,$isMultiple);
  // protected function options($name,$options);
  // protected function isOptionSelected($name,$value);

}

 ?>

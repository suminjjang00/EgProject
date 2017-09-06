<?php

require "../interface/Formimple.php";

$sweets=array('param1'=>'this param1',
'param2'=>'this param2',
'param3'=>'this param3');

if($_SERVER['REQUEST_METHOD']==="POST"){
  list($errors,$input)=validate_form();
  if($errors){
    show_form($errors);
  }else{
    process_form($input);
  }
}else{
  show_form();
}
function validate_form(){

}
function show_form($errors=array()){
  $defaults = array('delivery'=>'yes',
'size'=>'medium');
  $form = new FormHelped($defaults);
  include './impleTest_form.php';
}
function process_form($input){

}
 ?>

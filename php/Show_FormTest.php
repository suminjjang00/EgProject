<?php
  require 'FormTest_Helper.php';
  if($_SERVER['REQUEST_METHOD']==='POST'){
    process_form();
  }else {
    show_form();
  }
   function show_form(){
    $testVal = 'what is it?';
    $form = new FormHelper;
    include 'FormTest.php';
  }
   function process_form(){
     foreach ($_POST as $key => $value) {
       # code...
       echo $key.'='.$value."</br>";
     }
  }
 ?>

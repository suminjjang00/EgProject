<?php
$errors = array();
$input = array();

  function validate_form (){

    $input['text'] = isset(trim($_POST['text']));
    if(is_null($input['text']) || $input['text']===false){
      $errors = "text error";
    }
    // $input_int = isset(trim($_POST['age']));
    // $input['age'] = filter_input(INPUT_POST, $input_int,FILTER_VALIDATE_INT);
    // if(is_null($input['age']) || ($input['age']===false)){
    //   $error = 'age is error';
    // }
    // $input['checkbox'] = filter_input(INPUT_POST, $_POST['checkbox'],boolval);
    // if(is_null($input['checkbox']) || $input['checkbox']===false){
    //   $error = 'checkbox is error';
    // }
    return array($input,$errors);
  }
  function process_form($argument){
    print $argument;
  }
  function show_form($argument){
    foreach ($argument as $value) {
      print $value;
    }
  }

  if($_SERVER['REQUEST_METHOD']==='POST'){
    list($input,$form_errors) = validate_form();
    if($form_errors){
      show_form($form_errors);
    } else {
      show_form($input);
    }
  }
 ?>

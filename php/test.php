<?php
<<<<<<< HEAD
require "./FormHelper.php";

    function validate_form(){
      $input = array();
      $errors = array();

      $input['text']=$_POST['text'];

      if(strlen($input['text'])===0 || isset($input['text'])===null ){
        $errors[] = "doesn't like blank";
      }
      $input['age'] = $_POST['age'];
      if(!filter_input(INPUT_POST, 'age',FILTER_VALIDATE_INT)){
        $errors[] = "please check with int";
      }

      $input['language'] = $_POST['language'];
      if(is_null($input['language'])){
        $errors[] = "select with language";
      }
      return array($input,$errors);
    }
    $sweets = array('puff' =>"참깨" ,
                    'rice' =>"쌀",
                    'egg' => "egg");
    function generate_options($options){
      $html = '';
      foreach($options as $key => $option){
        $html .= "<option value=".$key.">".$option."</option>\n";
      }
      return $html;
    }
    function show_form($arrays){
      foreach($arrays as $value){
        print $value."</br>";
      }
      $sweets = generate_options($GLOBALS['sweets']);
      print "<select name='order'>".$sweets."</select>";
    }
    //  -------------------------------------------------------

    if($_SERVER['REQUEST_METHOD']==='POST'){
      list($form_data,$errors)=validate_form();
      if(!$errors){
        show_form($form);
      }else {
        show_form($errors);
      }
    }
?>
=======
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
>>>>>>> 88a91d30af32e2c73681f514850482cdcbee4370

<?php
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

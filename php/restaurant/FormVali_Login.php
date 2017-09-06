<?php

require "../Designpattern/Dbconnector.php";

require "FormHelper.php";

use Dbconnector\Singleton;

$db = Singleton::getInstance()->db;

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
function show_form($errors=array()){
  $form = new FormHelper();
  include 'login_form.php';
}
function validate_form(){

  $errors = array();
  $input = array();

  $input['login'] = $_POST['login'] !== null || 0 ? $_POST['login'] : null;
  trim($input['login']);
  if(!(strlen($input['login'])) || null || empty($input['login'])){
    $errors[] = 'email 제대로 입력 바람.';
  }
  $input['password']=$_POST['password'] !== null || 0 ? $_POST['password'] : null;
  trim($input['password']);
  if(!(strlen($input['password'])) || null || empty($input['password'])){
    $errors [] = 'password 제대로 입력 바람.';
  }
  return array($errors,$input);
}
function process_form($input){
  global $db;

  try {
    $sql = 'select dish_username, dish_password from user_table where dish_email= :user_email and dish_password= :password';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':user_email',$input['login']);
    $stmt->bindParam(':password',$input['password']);
    $stmt->execute();
    $email_user = $stmt->fetch();

  } catch (Exception $e) {
    $e->getMessage();
  }
  if($email_user===false){
    print "<h1>검색 결과가 없습니다</h1>";
  }else{
    print $email_user->dish_username;
    print $email_user->dish_password;
  }
}
?>

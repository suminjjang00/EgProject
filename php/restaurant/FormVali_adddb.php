<?php
require 'FormHelper.php';
require "../Designpattern/Dbconnector.php";

use Dbconnector\Singleton;

$db = Singleton::getInstance()->db;

if($_SERVER['REQUEST_METHOD']==='POST'){
  list($errors,$input) = validate_form();
  if($errors){
    show_form($errors);
  }else{
    process_form($input);
  }
}else{
show_form();
}

function validate_form(){
  $input=array();
  $errors=array();

  $input['dish_name'] = trim(($_POST['dish_name'] !== null ? $_POST['dish_name'] : ''));
  if (!(strlen($input['dish_name']))) {
    $errors[] = "이름을 입력해주세요.";
    # code...
  }
  $input['dish_price'] = filter_input(INPUT_POST,'dish_price',FILTER_VALIDATE_FLOAT);
  if($input['dish_price']<=0){
    $errors[] = "올바른 값을 입력해주세요";
  }

  $input['dish_spicy'] = isset($_POST['dish_spicy']) ? $_POST['dish_spicy'] : 'no';

  return array($errors,$input);
}

function show_form($errors=array()){
  $defaults = array(
    'dish_price'=>'5.00'
  );
  $form = new FormHelper($defaults);
  include 'insert_form.php';
}
function process_form($input){

  global $db;

  if($input['dish_spicy']=='yes'){
    $dish_spicy = 1;
  }else if($input['dish_spicy']=='no' || null){
    $dish_spicy = 0;
  }
  try {
    $stmt = $db->prepare('insert into
    dishes (dish_name, dish_price, dish_spicy, dish_date)
    values (?,?,?,now())');
    $stmt->execute(array($input['dish_name'],$input['dish_price'],$dish_spicy));
    print htmlentities($input['dish_name'].'메뉴가 추가되었습니다.');

  } catch (PDOException $e) {
    print "데이터베이스에 메뉴를 추가할 수 없습니다.";
  }
}
?>

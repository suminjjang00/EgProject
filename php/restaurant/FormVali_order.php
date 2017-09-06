<?php
  require 'FormHelper.php';
  require "../Designpattern/Dbconnector.php";

  use Dbconnector\Singleton;

  $db = Singleton::getInstance()->db;

  $sweets = array('puff'=>'this puff',
                  'square'=>'coconut milk jelly',
                  'cake'=>'black sugar cake',
                  'ricemeat'=>'rice bread');

  $main_dishes = array('cuke'=>'sea sunthree?',
                      'stomach'=>'this stomach',
                      'tripe'=>'wine source stomach',
                      'taro'=>'pig meat taro',
                      'giblets'=>'solt hot?',
                      'abalone'=>'what is it?');
if($_SERVER['REQUEST_METHOD']=='POST'){
  list($errors,$input) = validate_form();
  if($errors){
    show_form($errors);
  }else {
    process_form($input);
  }
}else {
  show_form();
}
function show_form($errors=array()){
  $defaults = array('delivery'=>'yes',
              'size'=>'medium');
  $form=new FormHelper($defaults);
  include 'order_form.php';
}
function validate_form(){
  $input = array();
  $errors = array();

  $input['name']= trim((null !== $_POST['name'] ? $_POST['name'] : ''));
  if(!strlen($input['name'])){
    $errors[] = 'input your name';
  }
  $input['size']=isset($_POST['size']) ? $_POST['size'] : '';
  if(!in_array($input['size'],['small','medium','large'])){
    $errors[] = 'choose size';
  }
  $input['sweet'] = isset($_POST['sweet']) ? $_POST['sweet'] : '';
  if (!array_key_exists($input['sweet'],$GLOBALS['sweets'])) {
    $errors[] = 'choose in desert';
  }
  $input['main_dish']=isset($_POST['main_dish']) ? $_POST['main_dish'] : '';
  if(count($input['main_dish'])!=2){
    $errors [] = 'chooes in two main dishes';
  }else {
    if(!(array_key_exists($input['main_dish'][0],$GLOBALS['main_dishes']) &&
        array_key_exists($input['main_dish'][1],$GLOBALS['main_dishes']) )){
          $errors [] = 'chooes in two main dishes';
        }
  }
  $input['delivery'] = isset($_POST['delivery']) ? $_POST['delivery'] : 'no';
  $input['comments'] = trim((null!==$_POST['comments'] ? $_POST['comments'] : ''));
  if($input['delivery']=='yes' && (!strlen($input['comments']))){
    $errors [] = 'input your address';
  }
  return array($errors,$input);
}
function process_form($input){

  global $db;

  $sweet = $GLOBALS['sweets'][$input['sweet']];
  $main_dish_1 = $GLOBALS['main_dishes'][$input['main_dish'][0]];
  $main_dish_2 = $GLOBALS['main_dishes'][$input['main_dish'][1]];

  $main_dishes = array($main_dish_1,$main_dish_2);
  $order_dishes = implode(',', $main_dishes);

  if(isset($input['delivery']) && ($input['delivery']=='yes')){
    $order_delivery = 1;
    $delivery = 'delivery';
  }else {
    $delivery = 'visit store';
    $order_delivery =0;
  }
  try {
    $sql = 'insert into dish_order
    (order_name, order_size, order_dessert, order_main, order_delivery, order_comment)
    values (?,?,?,?,?,?)';
    $stmt = $db->prepare($sql);
    $stmt -> execute(array($input['name'],$input['size'],$sweet,$order_dishes,$order_delivery,$input['comments']));

  } catch (Exception $e) {
    $e->getMessage();
  }
  $message = print "success, {$input['name']}.
              $sweet({$input['size']}), $main_dish_1, $main_dish_2 를 주문 완료 </br>
              배달 여부 $delivery</br>";
              if(strlen(trim($input['comments']))){
                $message .= '남긴 메모: '.$input['comments'];
              }
              mail('suminjjang00@gmail.com', 'New Order', $message);
              print nl2br(htmlentities($message,ENT_HTML5));
              header("Location: {$_SERVER['REQUEST_URI']}");
};
 ?>

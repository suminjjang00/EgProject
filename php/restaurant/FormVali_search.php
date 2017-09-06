<?php
require 'FormHelper.php';
require "../Designpattern/Dbconnector.php";
use Designpattern\Singleton;

$db = Singleton::getInstance()->db;

$spicy_choice = array('yes','no','either');

  // request method check;
  if($_SERVER['REQUEST_METHOD']==='POST'){
    list($errors,$input)=validate_form();
    if($errors){
      show_form($errors);
    }else{
      process_form($input);
    }
  }else{
    show_form();
  }

// submit data
function show_form($errors=array()){
  $defaults = array('min_price'=>'2.00','
  max_price'=>'20.00');
  $form = new FormHelper($defaults);
  include 'retrieve-form.php';
}
// data validate
function validate_form(){
  $errors=array();
  $input=array();

  $input['dish_name']=trim($_POST['dish_name'] !== null ? $_POST['dish_name'] : '');

  $input['min_price']=filter_input(INPUT_POST,'min_price',FILTER_VALIDATE_FLOAT);
  if($input['min_price']===null && $input['min_price']===false && $input['min_price'] <= 2.00){
    $errors [] = '올바른 값을 입력해주세요 2$ 보다 커야 합니다.';
  }

  $input['max_price']=filter_input(INPUT_POST,'max_price',FILTER_VALIDATE_FLOAT);
  if($input['max_price']===null && $input['max_price']===false && $input['max_price'] >= 20.00){
    $errors [] = '올바른 값을 입력해주세요 20$ 보다 작아야 합니다.';
  }
  if($input['min_price'] > $input['max_price']){
    $errors [] = '최소 가격은 최대 가격보다 낮아야 합니다.';
  }

  $input['dish_spicy'] = $_POST['dish_spicy'] !== null ? $_POST['dish_spicy'] : '';
  if(!(array_key_exists($input['dish_spicy'], $GLOBALS['spicy_choice']))){
    $errors [] = '올바른 맵기를 선택해 주세요.';
  }

  return array($errors,$input);
}

// process main form
function process_form($input){

global $db;

$sql = 'select dish_name, dish_price, dish_spicy from dishes
where dish_price <= ? and dish_price >= ?';

if(strlen($input['dish_name'])){
  $dish = $db->quote($input['dish_name']);
  $dish = strtr($dish, array('_'=> '\_', '%'=>'\%'));
  $sql .= " and dish_name like $dish";
}
$spicy_choice = $GLOBALS['spicy_choice'][$input['dish_spicy']];
echo $spicy_choice;
if($spicy_choice=='yes'){
  $sql .= " and dish_spicy=1";
}elseif($spicy_choice=='no'){
  $sql .= " and dish_spicy=0";
}

try {
  $stmt = $db->prepare($sql);
  $stmt->execute(array($input['max_price'], $input['min_price']));
  $dishes = $stmt->fetchAll();
  if(count($dishes)==0){
    echo "검색 결과가 없습니다.";
  }else{
    print "<table>";
    print "<tr><th>메뉴명</th><th>가격</th><th>맵기</th></tr>";
    foreach ($dishes as $dish) {
      if($dish->dish_spicy==1){
        $spicy='yes';
      }else{
        $spicy='no';
      }
      printf ('<tr><th>%s</th><th>%0.2f</th><th>%s</th></tr>', htmlentities($dish->dish_name),$dish->dish_price,$spicy);
    }
  }
} catch (Exception $e) {
  echo $e->getMessage();
}

};
 ?>

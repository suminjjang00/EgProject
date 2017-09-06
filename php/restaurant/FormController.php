<?php
require "../interface/Formimple.php";
  // 컨트롤러에서 폼 발리를 사용하려면 어떻게 해야 할까?
  // 첫번째로 폼 컨트롤러로 들어오면 메인 화면을 보여줌
  // 두번째로 메인화면에서 href로 들어온 값을 폼 컨트롤러에서 조종함.
if($_SERVER['REQUEST_METHOD']==='GET'){
  $form = new FormHelped();
  $form->show_form();
  $FormHelped->show_form();
};
 ?>

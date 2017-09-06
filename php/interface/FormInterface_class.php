<?php
namespace FormInterface_class;

interface FormInterface_class{
  public function validate_form();
  public function show_form($errors=array());
  public function process_form($input);

}
 ?>

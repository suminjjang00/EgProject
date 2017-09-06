<?php
  

  include "FormHelpedInterface.php";

  class FormHelped implements FormHelpedInterface{

    protected $values = array();

    function __construct($values=array()){
      if($_SERVER['REQUEST_METHOD']==='POST'){
        $this->values = $_POST;
      }else{
        $this->values=$values;
      }
    }
    public function input($type,$attributes=array(),$isMultiple=false){
      $attributes['type'] = $type;
      return $this->tag('input',$attributes,$isMultiple);
    }
    public function tag($tag,$attributes,$isMultiple=false){
      return "<$tag {$this->attributes($attributes,$isMultiple)}>";
    }
    public function attributes($attributes,$isMultiple){
      $tmp = array();
      foreach ($attributes as $key => $value) {
        # code...
        $tmp [] = $key."=\"$value\"";
      }
      return implode(' ', $tmp);
    }
    // public function select($options,$attributes);
    // public function textarea($options);
    // public function start($tag,$attributes=array(),$isMultiple=false);
    // public function end($tag);
    // protected function options($name,$options);
    // protected function isOptionSelected($name,$value);
    public function encode($value){
      return htmlentities($value);
    }
  }
?>

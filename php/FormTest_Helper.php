<?php
  /**
   *
   */
  class FormHelper{

    private $values=array();

    function __construct($values=array()){
      # code...
      if($_SERVER['REQUEST_METHOD']==='POSt'){
        $this->values = $_POST;

      }else {
        $this->values = $values;

      }
    }
    public function input($type,$attributes=array(),$isMultiple=false){
      $attributes['type'] = $type;
      if(($type==='radio')||($type==='checkbox')){
        if($this->isOptionSelected(
        isset($attributes['name']),isset($attributes['value'])
        )){
          $attributes['checked']=true;
        }
      }
      return $this->tag('input',$attributes,$isMultiple);
    }

    public function tag($tag,$attributes=array(),$isMultiple=false){
      return "<$tag {$this->attributes($attributes, $isMultiple)} />";
    }
// --------------------------------------------------------------------
    protected function attributes($attributes,$isMultiple,$valueAttribute=true){
      $tmp=array();

      // how to work it attributes??

      if($valueAttribute && isset($attributes['name'])&&
      array_key_exists($attributes['name'],$this->values)){
        $attributes['value'] = $this->values[$attributes['name']];
      }
      //
      foreach ($attributes as $k => $v) {
        # code...
        if(is_bool($v)){
          if($v) {

            $tmp[] = $this->encode($k);
          }
        }else {
          $value = $this->encode($v);
            if($isMultiple && ($k== 'name')){
              $value .= '[]';
            }
            $tmp[] = $k."=\"$value\"";
        }
      }
      return implode(' ',$tmp);
    }
// --------------------------------------------------------------------
    public function newInput($type,$attributes=array()){
      $attributes['type']=$type;
      return $this->newTag('input',$attributes);
    }
    public function newTag($tag, $attributes=array()){
      return "<$tag {$this->newAttr($attributes)} />";
    }
    protected function newAttr($attributes){
      $tmp = array();

      foreach ($attributes as $key => $value) {
        $v=$this->encode($value);
        $tmp[] =$key."=\"$v\"";
        # code...
      }
      return implode(' ',$tmp);
    }
    public function encode($s){
      return htmlentities($s);
    }
  }

 ?>

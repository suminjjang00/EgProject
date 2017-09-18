<?php
namespace Abstract_class;
/**
 *
 */
abstract class Abstract_class {
  // protected $values = array();

  // function __construct($values = array()){
  //   if($_SERVER['REQUEST_METHOD']==="POST"){
  //     $this ->values = $_POST;
  //   }else {
  //     // ??? why this $this is point to values??
  //     $this ->values = $values;
  //   }
  // }
  public function input($type,$attributes=array(),$isMultiple=false){
    $attributes['type'] = $type;
    if(($type === 'radio') || ($type === 'checkbox')){
      if($this -> isOptionSelected(
      isset($attributes['name']) ? $attributes['name']:null,
      isset($attributes['value'])? $attributes['value']:null
       )){
         $attributes['checked'] = true;
       }
    }
    return $this->tag('input',$attributes,$isMultiple);
  }
  public function select($options,$attributes=array()){
    $multiple =isset($attributes['multiple']) ? $attributes['multiple'] : false;
    return $this->start('select',$attributes,$multiple).
          $this->options($attributes['name'] !== null ? $attributes['name'] : null ,$options).
          $this->end('select');
  }
  public function textarea($attributes=array()){
    $name = isset($attributes['name']) ? $attributes['name'] : null;
    $value = isset($this->values[$name]) ? $this->values[$name] : '';
    return $this->start('textarea',$attributes).
          htmlentities($value).
          $this->end('textarea');

  }
  public function tag($tag,$attributes,$isMultiple=false){
    return "<$tag {$this->attributes($attributes,$isMultiple)} />";

  }
  public function start($tag, $attributes=array(),$isMultiple=false){
    $valueAttribute = (! (($tag=='select') || ($tag=='textarea')));
    $attrs = $this->attributes($attributes,$isMultiple,$valueAttribute);
    return "<$tag $attrs>";
  }
  public function end($tag){
    return "</$tag>";
  }
  public function attributes($attributes,$isMultiple, $valueAttribute=true){
    $tmp = array();
    if($valueAttribute && isset($attributes['name']) && array_key_exists($attributes['name'], $this->values)){
      $attributes['value'] = $this->values[$attributes['name']];
    }
    foreach ($attributes as $k => $v) {
      if(is_bool($v)){
        if($v){
          $tmp[] = $this->encode($k);
        }
      }else {
        $value = $this->encode($v);
        if($isMultiple && ($k=='name')){
          $value.="[]";
        }
        $tmp [] = $k."=\"$value\"";
      }
      # code...
    }
    return implode(' ', $tmp);
  }
  protected function options($name,$options){
    $tmp = array();
    foreach ($options as $k => $v) {
      # code...
      $s = "<option value=\"{$this->encode($k)}\"";
      if ($this->isOptionSelected($name,$k)){
        $s.='selected';
      }
      $s.=">{$this->encode($v)}</option>";
      $tmp [] = $s;
    }
    return implode('',$tmp);
  }
  protected function isOptionSelected($name,$value){
    if(!isset($this->values[$name])){
      return false;
    }else if(is_array($this->values[$name])){
      return in_array($value,$this->values[$name]);
    }else {
      return $value == $this->values[$name];
    }
  }
  public function encode($s){
    return htmlentities($s);
  }
}

 ?>

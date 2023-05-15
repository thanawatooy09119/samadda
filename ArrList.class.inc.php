<?php
class ArrList{
var $arr = array();
var $len = 0;

function add($str){
    $this->arr[$this->len] = $str; 
    $this->len++;
}// end add

function show($target){
    $str = "";
    $str = $this->arr[$target];
    return $str;
}
function del($target){
  $arr2 = array();
  $loop = $target;
  for($i=0;$i<=(($this->len-$target)-1);$i++){
          $arr2[$i] = $this->arr[$loop++];
          
  }
  
  $this->arr = $arr2;
  /**  for($i=0;$i<=(count($arr2)-1);$i++){
          print " <b>$i</b>";
  }
  **/
  
  $this->len = ($this->len)-$target;

}


}

?>
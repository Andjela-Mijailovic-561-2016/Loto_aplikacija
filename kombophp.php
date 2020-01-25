<?php
$errors = array();
if(isset($_POST['submit'])){
  
  $kombinacija=array();
  $count=0;
  for($i = 1;$i<=40;$i++){
    $str="num$i";
    if (isset($_POST[$str])) {
      $count++;
      array_push($kombinacija, $i);
    }
  }
if($count!=7){
  array_push($errors, "Niste uneli ispravan broj cifara. Unesite 7 cifara:");
}
else{
  
} 
}


?>
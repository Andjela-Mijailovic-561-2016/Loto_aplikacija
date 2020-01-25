<?php
require_once('core/conn.php');
$errors = array();

$connection = mysqli_connect("localhost", "root", "", "registration") or die("Ne moze se povezati!");


if(isset($_POST['submit'])){
  $kombinacija=array();
  $count=0;
  for($i = 1;$i<=40;$i++){
    $str="num$i";
    if (isset($_POST[$str])) {
      $count++;
      array_push($kombinacija, $i);
    }

  
  //header('location: index.php'); 

  }
if($count!=7){
  array_push($errors, "Niste uneli ispravan broj cifara. Unesite 7 cifara:");
}
else{
  global $brojkombinacija; 
  session_start();
  //$user = $_SESSION['username'];
  //$br_odigranih= "SELECT DISTINCT br_komb FROM kombinacija WHERE korisnik ='$user'";
  //$brOdg = mysqli_query($connection, $br_odigranih);*/
  $user = $_SESSION['username'];
  $br_odigranih= "SELECT DISTINCT br_komb FROM kombinacija WHERE korisnik ='$user'";
  $brOdg = mysqli_query($connection, $br_odigranih);

//foreach($resultbroj as $row){
  // $brojkombinacija = $row['br_komb'];
   if (is_null($brOdg)){
     $brojkombinacija = 0;

    
  }
  else{
    foreach ($brOdg as $odig) {
 $brojkombinacija=$odig['br_komb'];
  
  
  }

}
  if($brojkombinacija == 0){
 /*oreach ($brOdg as $odig) {
  $brOdig=$odig['br_komb'];
  echo $brOdig;
}
  if(is_null($brOdig[0])){*/
    
  $brojkombinacija++;
  $novNovac = "SELECT novac FROM registracija WHERE username = '$user'";
  $resuNovac = mysqli_query($connection, $novNovac);
foreach ($resuNovac as $nova) {
  $konacanIzn=$nova['novac'];
   }
    if($konacanIzn >= 100){
    $konacanIzn=$konacanIzn-100;
  
  $novUpda = "UPDATE registracija SET novac=$konacanIzn WHERE username='$user' ";
  mysqli_query($connection,$novUpda);
      foreach($kombinacija as $key)
      {
    
        $sql = "INSERT INTO kombinacija (korisnik, br_komb , Izvuceni) VALUES ('$user', '$brojkombinacija' , '$key')";
        $resulting = $connection->query($sql);
    
       }
    }
    else{
  array_push($errors, "Nemate dovoljno novca na racunu!");
  $brojkombinacija--;
}}
else {
  

  array_push($errors, "Vec ste uneli Vasu kombinaciju! Idite na izvlacenje!");
}
/*else{
  array_push($errors, "Nemate dovoljno novca na racunu!");
  $brojkombinacija--;
}*/
  
  }} 


?>
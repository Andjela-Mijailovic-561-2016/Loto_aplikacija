<!DOCTYPE html>
<html>
<body>
  <head>
    <title>Izvlačenje</title>
  <link rel="stylesheet" type="text/css" href="styleLotooo.css">
</head>
<?php
require_once('core/conn.php');
include('server.php');
  $count = 7;
  $highball = 40;
  $numbers = range(1, $highball);
  shuffle($numbers);
  $drawn = array_slice($numbers, - $count);
  sort($drawn);
  $counter = 0;
  $counterKombinacija = 0;
  $sedmica = 10000000;
  $username = $_SESSION['username'];
  $tvoji_brojevi = array();
  foreach($drawn as $key => $value)
  {
    $brojevi = "SELECT Izvuceni FROM kombinacija WHERE korisnik = '$username'";
    $rezultat = mysqli_query($link, $brojevi);
    foreach($rezultat as $broj_korisnika){
      $trenutniBroj = $broj_korisnika['Izvuceni'];
      array_push($tvoji_brojevi, $trenutniBroj);
      if($value==$trenutniBroj){
        $counter++;
      }
      $counterKombinacija++;
      if ($counterKombinacija > 7){
        $counterKombinacija = 1;
      }
    }
    $sql = "INSERT INTO `loto_sedmica` (`drawn`) VALUES ('$value');";
    $result = $link->query($sql);
  }

  $broj_pogodaka = $counter;
if(!(empty($tvoji_brojevi))) {
    echo "<table class='table' border='1'>";
   $niz = array( );
   foreach($drawn as $key => $value)
{
	array_push($niz, $value);
}
echo "<tr>";
echo "<th colspan='2'>IZVLACENJE</th>";
echo "</tr>";
echo "<tr>";
 
echo "<td><b>1. IZVUCENI BROJ</b></td>";
echo "<td>$niz[0]</td>";
echo "</tr>";
echo "<tr>";
 
echo "<td><b>2. IZVUCENI BROJ</b></td>";
echo "<td>$niz[1]</td>";
echo "</tr>";
echo "<tr>";
 
echo "<td><b>3. IZVUCENI BROJ</b></td>";
echo "<td>$niz[2]</td>";
echo "</tr>";
echo "<tr>";
 
echo "<td><b>4. IZVUCENI BROJ</b></td>";
echo "<td>$niz[3]</td>";
echo "</tr>";
echo "<tr>";
 
echo "<td><b>5. IZVUCENI BROJ</b></td>";
echo "<td>$niz[4]</td>";
echo "</tr>";echo "<tr>";
 
echo "<td><b>6. IZVUCENI BROJ</b></td>";
echo "<td>$niz[5]</td>";
echo "</tr>";

    //echo $value. " ";
 echo "<tr>";
 
echo "<td><b>7. IZVUCENI BROJ</b></td>";
echo "<td>$niz[6]</td>";
echo "</tr>"; 
echo "</table>";

  if ($counter % 7 == 0 && $counterKombinacija == 7 && $counter != 0){
  	echo "<table class='table' border='1'>";
    echo "<tr>";
    echo "<td><strong>BROJ POGODAKA: $broj_pogodaka</strong></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><i><b>Cestitamo, $username, izvukli ste sedmicu! Osvojili ste 10000000!</b></i></td";
    echo "</tr>";
    echo "</table>";
   // echo '<br> Cestitamo, '."$username".' izvukli ste sedmicu! Osvojili ste 10000000!';
    $pare = "UPDATE registracija SET novac+=$sedmica WHERE username='$username' ";
    $rezpare = mysqli_query($link, $pare);
  }
  else if($counter % 7 != 0 && $counterKombinacija == 7){
   
    $tvoji_brojevi=array_unique($tvoji_brojevi);
    sort($tvoji_brojevi);
  	echo "<table  class='table' border='1'>";
   echo "<tr>";
    echo "<td><strong>VASI BROJEVI SU: $tvoji_brojevi[0] , $tvoji_brojevi[1] , $tvoji_brojevi[2] , $tvoji_brojevi[3] , $tvoji_brojevi[4] , $tvoji_brojevi[5] , $tvoji_brojevi[6]</storng></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><strong>BROJ POGODAKA: $broj_pogodaka</storng></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><i><b> Vise srece drugi put, korisnice $username!</b></i></td>";
    echo "</tr>";
    echo "</table>";
    //echo "<br> Vise srece drugi put, korisnice $username";
  }
  else if($counter == 0){
    
    $tvoji_brojevi=array_unique($tvoji_brojevi);
    sort($tvoji_brojevi);
  	echo "<table  class='table' border='1'>";
    echo "<tr>";
    echo "<td><strong>VASI BROJEVI SU: $tvoji_brojevi[0] , $tvoji_brojevi[1] , $tvoji_brojevi[2] , $tvoji_brojevi[3] , $tvoji_brojevi[4] , $tvoji_brojevi[5] , $tvoji_brojevi[6]</storng></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><strong>BROJ POGODAKA: $broj_pogodaka</storng></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><i><b> Vise srece drugi put, korisnice $username!</b></i></td>";
    echo "</tr>";
    echo "</table>";
    //echo "<br> Vise srece drugi put, korisnice $username";
  }
  $brisanje_br_komb = "DELETE FROM kombinacija WHERE korisnik = '$username'";
  $brisanjeQuery = mysqli_query($link, $brisanje_br_komb);}
  else{echo "<div class=greska><br><br><b><p>MORATE UNETI SVOJU KOMBINACIJU!!! </p></b><br><a href=kombo.php>Unesite vašu kombinaciju</a></div>";}
 ?>
  <div class="povratna">
<a  href="index.php">Vratite se na почетну stranu</a>
</div>
</body>
</html>

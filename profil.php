<?php include('komboerror.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<style>
	body{
		background-color: lightblue;
		background-size: 300px;
	}
	form,a { padding : 20px;


	}
	.error1{
	width: 98%;
	padding: 10px;
	
	
	margin: 0px auto;
	color: red;
    background: lightblue;
    text-align: left;
}
	table,th,td{
		border: 1px solid #B0C4DE;
		background-color: white;
		border-radius: 5px;
		padding-top: 30px;
  		padding-right: 30px;
 		padding-bottom: 30px;
 		padding-left: 30px;
 		width: 800px;
 		height: 30px;
 		margin-left: 250px;
 		margin-right: 250px;
 		margin-top: 50px;
 		font-size:110%;
 		

	}
	td,th{
		text-align: center;

	}
	th{
		background:	#5F9EA0;
		color: white;
		font-family: bold;
		border: 1px solid #B0C4DE;

	}
	
</style>
	<title>Profil</title>
</head>
<body>
	<?php


	$hostname = "localhost";
	$username = "root";
	$password = "";
	$database = "registration";

	$connection = mysqli_connect("localhost", "root", "", "registration") or die("Ne moze se povezati!");

	

	session_start();
	$user = $_SESSION['username'];
	$query = "SELECT email FROM registracija WHERE username = '$user'";
	$result = mysqli_query($connection, $query);
	foreach($result as $row){
	$email = $row['email'];
}



	?>
	 <?php   $errors1=array();?>
	<?php

	$db= mysqli_connect('localhost','root','','registration');
	$pocetniIznos = "SELECT novac FROM registracija WHERE username = '$user'";
	$rezultat = mysqli_query($db, $pocetniIznos);
	foreach($rezultat as $value){
		$konacanIznos = $value['novac'];
	}

	
	if(!(empty($_POST["money"]))) {
		 
		if($_POST["money"] < 0){
		array_push($errors1, "UNELI STE NEGATIVAN IZNOS!!!");
		$ukupanIznos = $konacanIznos;	
	}}
if(empty($_POST["money"])){
		$ukupanIznos = $konacanIznos;
	}
	else {
		if($_POST["money"] >= 0){
		$addMoney = $_POST["money"];
		$ukupanIznos = $konacanIznos + $addMoney;
		$sqlUpdate = "UPDATE registracija SET novac=$ukupanIznos WHERE username='$user' ";
		mysqli_query($db, $sqlUpdate);}
	}	

	
	

echo "<table border='1'>";
echo "<tr>";
echo "<th colspan='2'>MOJ PROFIL</th>";
echo "</tr>";
echo "<tr>";
echo "<td><b>KORISNICKO IME<b></td>";
echo "<td><b>$user</b></td>";
echo "</tr>";
echo "<tr>";
echo "<td><b>EMAIL</b></td>";
echo "<td>$email</td>";
echo "</tr>";
echo "<tr>";
echo "<td><b>UKUPNA SVOTA NOVCA</b></td>";
echo "<td><b>$ukupanIznos</b></td>";
echo "</table>";


?>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		
		Unesite koliko novca ulazete: <input name="money" type="number" >
		<input type="submit" name="submit">

	</form>
	<?php if (count($errors) > 0): ?>
	<div class="error1">
		 <?php 
		  foreach ($errors1 as $error): ?>
			<p style="margin:7px"><?php echo $error ?></p>
		 <?php endforeach ?>
		 	</div> 
<?php endif ?>

<a href="index.php" >Vrati se na pocetnu stranu </a>

</body>
</html>
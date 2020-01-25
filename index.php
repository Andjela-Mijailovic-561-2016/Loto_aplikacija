<?php
session_start();
 if($_SESSION['success']==1){	?>



	<?php 
	require_once('core/conn.php');
	$query = "CREATE TABLE `registration`.`loto_sedmica` ( `id` INT(2) UNSIGNED NOT NULL AUTO_INCREMENT,
	`drawn` INT NOT NULL ,
	`kolo` INT NOT NULL ,
	 PRIMARY KEY (`id`)) ENGINE = MyISAM;";
	$result = $link->query($query);
	$query2 = "CREATE TABLE `registration`.`kombinacija` ( `id` INT(2) UNSIGNED NOT NULL AUTO_INCREMENT, `korisnik` VARCHAR(255) NOT NULL , `br_komb` INT UNSIGNED NOT NULL , `Izvuceni` INT UNSIGNED NOT NULL, PRIMARY KEY (`id`) ) ENGINE = MyISAM;";
	$result2 = $link->query($query2);
	 ?>

	<!DOCTYPE HTML>
	<html>
	<head>
<title>Loto</title>
		<link rel="stylesheet" href="projekat1a1.css"> 
	</head>
	<body>
		<div class="dugme">
			<a href = "profil.php"><button>Moj profil</button></a>
			<a href = "kombo.php"><button>Moja kombinacija</button></a>
			<a href = "loto.php"><button>Izvlacenje</button></a>
			<a href = "odjava.php"><button>Odjava</button></a>
		</div>
	</body>
	</html>

<?php
} else {
	header('location: signin.php');
	die(); 
}
	?>
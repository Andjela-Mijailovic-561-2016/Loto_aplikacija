<?php 
session_start();
$errors = array();
$username="";
$email="";
$password_1="";
$password_2="";


$db= mysqli_connect('localhost','root','','registration');
if($db == FALSE) echo 'NEUSPESNA KONEKCIJA';

if (isset($_POST['register'])) {
	 $username =$_POST['username'];
	 $email = $_POST['email'];
	 $password_1 =$_POST['password_1'];
	 $password_2 =$_POST['password_2'];


if (empty($username)) {
	array_push($errors, "Potrebno je uneti korisnicko ime.");
}
if (empty($email)) {
	array_push($errors, "Potrebno je uneti email.");
}
if (empty($password_1)) {
	array_push($errors, "Potrebno je uneti lozinku.");
}

if( $password_1 != $password_2 ) {
	array_push($errors, "Lozinke se ne poklapaju.");
}
if (count($errors) == 0) {
	$password = md5($password_1);
	$sqli = "INSERT INTO registracija(username , email , password)
	        VALUES('$username', '$email', '$password')";
	mysqli_query($db, $sqli);        
    $_SESSION['username'] = $username;
    $_SESSION['success'] = 1;
    header('location: index.php'); //redirect to home page
} }
//log in user from signin.php
if (isset($_POST['login'])) {
	 $username =$_POST['username'];
	 $password =$_POST['password'];
	

	if (empty($username)) {
	array_push($errors, "Potrebno je uneti korisnicko ime.");
}

if (empty($password)) {
	array_push($errors, "Potrebno je uneti lozinku.");
}
if (count($errors) == 0) {
	$password = md5($password); //encrypt password before comparing from database
	$query = "SELECT * FROM registracija WHERE username='$username' AND password='$password'";
	$results = mysqli_query($db, $query);
	//log user in
	if (mysqli_num_rows($results) == 1){
		$_SESSION['username'] = $username;
    	$_SESSION['success'] = 1;
    	header('location: index.php'); //redirect to home page
	} 
else{
	array_push($errors, "Pogresna kombinacija korisnickog imena/lozinka");
}
}
}

//logout
if(isset($_GET['logout'])){
	session_destroy();
	unset($_SESSION['username']);
	header('location: login_sem.php'); 
}



?>
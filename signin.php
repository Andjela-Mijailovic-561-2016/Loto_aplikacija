

<?php include('server.php');
require_once('core/conn.php');
$query = "CREATE TABLE `registration`.`registracija` ( `id` INT UNSIGNED NOT NULL AUTO_INCREMENT, `username` VARCHAR(255) NOT NULL , `email` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL, `novac` INT UNSIGNED NOT NULL DEFAULT '150',  PRIMARY KEY(`id`) ) ENGINE = MyISAM; ";
$result = $link->query($query);
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Loto</title>
    <link rel="stylesheet" type="text/css" href="stylePrijavaaa.css">
</head>
<body>
    <div class="header">
        <h2>Prijava</h2>
    </div>
    <form method="post" action="signin.php">
        <?php include('errors.php'); ?>
        <div class="input-group" >
            <label>Korsnicko ime</label>
            <input type="text" name="username">
        </div>
        
        <div class="input-group" >
            <label>Lozinka</label>
            <input type="Password" name="password">
        </div>
        
        <div class="input-group">
            <button type="submit" name="login" class="btn"> Prijavi se </button>
        </div>
        <p>
            Nisi registrovan? <a href="login_sem.php"> Registracija </a>
        </p>

    </form>
</body>
</html> 
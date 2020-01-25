    <?php include('server.php'); ?>
    <!DOCTYPE html>
    <html>
    <head>
    	<title>Loto</title>
    	<link rel="stylesheet" type="text/css" href="stylePrijavaaa.css">
    </head>
    <body >
        <div class="header">
    	    <h2>Registracija</h2>
        </div>
        <form method="post" action="login_sem.php">
        	<?php include('errors.php'); ?>
        	<div class="input-group" >
        		<label>Korisnicko ime</label>
        		<input type="text" name="username" value="<?php echo $username; ?>"  >
        	</div>
        	<div class="input-group" >
        		<label>Email</label>
        		<input type="text" name="email" value="<?php echo $email; ?>">
        	</div>
        	<div class="input-group" >
        		<label>Lozinka</label>
        		<input type="Password" name="password_1">
        	</div>
        	<div class="input-group" >
        		<label>Potvrdi lozinku</label>
        		<input type="Password" name="password_2">
        	</div>
        	<div class="input-group">
        		<button type="submit" name="register" class="btn"> Registruj se </button>
        	</div>
            <p>
            	Vec ste registrovani? <a href="signin.php"> Prijava </a>
            </p>

        </form>
    </body>
    </html> 
}
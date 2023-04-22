<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="login.css"/>
	<title>login2</title>
</head>
<body> <!-- CSS avec le login et le mot de passe -->
	<form method="post">
	<?php
		include 'connexiondb.php';
	?>
		<p><input type="radio" name="type" value="eleve"/> Elève </p>
		<p><input type="radio" name="type" value="maitredestage"/> Maître de stage </p>
		<p><input type="radio" name="type" value="responsable"/> Responsable de site </p>
		</br>
		
    		ID: 
    		<input type="text" id="username" name="username" required> <br/>
		

   			Mot de Passe:
    		<input type="password" id="password" name="password"
           		minlength="5" required><br/>

			<input type="submit" name="submit" value="Aller"/><br/>
		
		<!-- Début partie php avec les conditions de remplissage -->
	<?php
		
		if(isset($_POST['submit'])){

			$id = $_POST['username'];
			$mdp = $_POST['password'];
			$type = $_POST['type'];}
		
		$connex=mysqli_connect($host,$user,$password,$db);
		$query='SELECT * FROM eleve WHERE login="'.$id.'" AND pw = "'.$mdp.'";';
		$test=mysqli_query($connex,$query);
		$result=mysqli_fetch_array($test);
		
		if (!$test){
			echo "Erreur";
		}

		if (($type == 'eleve') && ($id==$result['login']) && ($mdp==$result['pw'])) {
			include 'connexion.php';}
		
		else {echo'Revoir votre identifiant et votre mot de passes';}
		
	?>
	

	</form>
</body>
</html>
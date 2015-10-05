<?php
require('config/config.php');
require('model/functions.fn.php');
session_start();

if(	isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && 
	!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {

	if (isUsernameAvailable($db, $_POST['username']) === true) {
		if (isEmailAvailable($db, $_POST['email']) === true) {
			 userRegistration($db,  $_POST['username'],  $_POST['email'],  $_POST['password']);
		}
		else{
			echo "l'email n'est pas disponible";
		}
	}
	else{
		echo 'l\'username est deja n\'est pas disponible';
	}
}
else{ 
	$_SESSION['message'] = 'Erreur : Formulaire incomplet';
	header('Location: register.php');
}
	
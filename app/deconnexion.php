<?php 
	include_once 'demarage.php';

	session_unset();
	//session_destroy();

	$_SESSION['alert'] = new Alert('success','Vous avez bien été déconnecté');

	redirige('../web/index');

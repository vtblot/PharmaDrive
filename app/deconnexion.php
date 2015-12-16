<?php 

	session_unset();

	$_SESSION['alert'] = new Alert('success','Vous avez bien été déconnecté');

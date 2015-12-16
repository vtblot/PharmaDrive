<?php 
include_once 'demarage.php';

$erreur = false;

if (isset($_POST['mail']) && empty($_POST['mail']))
{
	$erreur = true;
}
else if (isset($_POST['pass']) && empty($_POST['pass']))
{
	$erreur = true;
}

if($erreur)
{
	$_SESSION['alert'] = new Alert('danger','Erreur : le couple utilisateur/mot de passe incorect');
	redirige("index");
}
else
{
	$user = new User();
	$user->setLogin($_POST['mail']);
	$user->setPass($_POST['pass']);

	if($userDao->connexion($user))
	{
		$user = $userDao->hydrate($user);
		$user->setAuthentified(true);
		$_SESSION['user']= $user;

		$_SESSION['alert'] = new Alert('success','Bonjour '.$user->getLogin());
		redirige("index");
	}
	else
	{
		$_SESSION['alert'] = new Alert('danger','Erreur : le couple utilisateur/mot de passe incorect');
		redirige("index");
	}
}

?>

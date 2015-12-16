<?php 

$user = new User();
$user->setLogin($form['login']);
$user->setPass($form['pass']);

if($userDao->connexion($user))
{
	$user = $userDao->hydrate($user);
	$user->setAuthentified(true);
	$_SESSION['user']= $user;
	$_SESSION['alert'] = new Alert('success','Bonjour '.$user->getLogin());
}
else
{
	$_SESSION['alert'] = new Alert('danger','Erreur : le couple utilisateur/mot de passe incorect');
}



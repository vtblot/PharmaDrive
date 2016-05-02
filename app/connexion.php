<?php 

//on recupere les infos du fomulaire
$pass = $form['pass'];
$login = $form['login'];

//on créer un nouvel utilisateur
$user = new User();
$user->setLogin($login);
$user->setPass($pass);

//on vérifie les identifiants avec la bdd
if($userDao->connexion($user))
{
	//les identifiants sont correct
	$user = $userDao->hydrate($user);
	$user->setAuthentified(true);
	$_SESSION['user']= $user;
	$_SESSION['alert'] = new Alert('success','Bonjour '.$user->getLogin());
}
else
{
	//les identifiants sont incorrect
	$_SESSION['alert'] = new Alert('danger','Erreur : le couple utilisateur/mot de passe incorect');

	redirige('/ppe_pharmadrive');
}



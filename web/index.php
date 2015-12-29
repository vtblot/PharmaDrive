<?php

require_once '../app/demarage.php';


if(isset($_GET['lien']))
{
	switch ($_GET['lien']) {
		case 'deconnexion':
			if(!$co)
			{
				//si il est pas co, on le renvoie

				$_SESSION['alert'] = new Alert('erreur','Vous n\'êtes pas connecté');
				redirige('/ppe_pharmadrive_noob');
			}
			//on inclu la page de deconnexion
			include_once '../app/deconnexion.php';
			//et on redirige
			redirige('/ppe_pharmadrive_noob');
			break;
		case 'connexion':
			if($co)
			{
				//si il est co, on le renvoie

				$_SESSION['alert'] = new Alert('erreur','Vous êtes déjà connecté');
				redirige('/ppe_pharmadrive_noob');
			}
			//on vérifie la présence des chaines de caractère
			if (isset($_SESSION['login']) && empty($_SESSION['login']))
			{
				$_SESSION['alert'] = new Alert('danger','Erreur : le nom d\'utilisateur n\'a pas été renseillé');
			}
			else if (isset($_SESSION['pass']) && empty($_SESSION['pass']))
			{
				$_SESSION['alert'] = new Alert('danger','Erreur : le mot de passe n\'a pas été renseillé');
			}
			else
			{
				//tout est ok
				$form = array('login' => $_POST['login'], 'pass' => $_POST['pass']);
				include_once '../app/connexion.php';
			}
			redirige('/ppe_pharmadrive_noob');
			break;
		default:
			//en cas de lien invalide, on redirige vers l'index

			$_SESSION['alert'] = new Alert('erreur','Cette page n\'existe pas');
			redirige('/ppe_pharmadrive_noob');
			break;
	}
}
else
{
	include_once 'nav.php';
			
	if($co)
	{
		echo '<ul>'.PHP_EOL;
		echo '	<li>Patients : reste a faire la page du patient</li>'.PHP_EOL;
		echo '	<li>Visites : reste les pages uniques</li>'.PHP_EOL;
		echo '</ul>'.PHP_EOL;
	}
	else
	{
		echo '<form class="form-signin" method="post" action="connexion">'.PHP_EOL;
		echo '	<fieldset>'.PHP_EOL;
		echo '	<h2 class="form-signin-heading">Connexion</h2>'.PHP_EOL;
		echo '	<label for="login" class="sr-only">Login</label>'.PHP_EOL;
		echo '	<input type="text" id="mail" name="login" class="form-control" placeholder="Nom d\'utilisateur" autofocus>'.PHP_EOL;
		echo '	<label for="pass" class="sr-only">Mot de passe</label>'.PHP_EOL;
		echo '	<input type="password" id="pass" name="pass" class="form-control" placeholder="Mot de passe" >'.PHP_EOL;
		echo '	</fieldset>'.PHP_EOL;
		echo '	<input class="btn btn-lg btn-primary btn-block" type="submit" value="Connexion"/>'.PHP_EOL;
		echo '</form>'.PHP_EOL;
	}


}


include_once 'footer.php';
?>

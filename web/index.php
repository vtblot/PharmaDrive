<?php

require_once '../app/demarage.php';


if(isset($_GET['lien']))
{
	switch ($_GET['lien']) {
	case 'deconnexion':
		//page pour se déconnecté
		if(!$co)
		{
			//si l'utilisateur n' est pas connecté, on le renvoie à la page d'acceuil

			$_SESSION['alert'] = new Alert('erreur','Vous n\'êtes pas connecté');
			redirige('/ppe_pharmadrive');
		}
		//on inclu la page de deconnexion
		require_once '../app/deconnexion.php';
		//et on redirige
		redirige('/ppe_pharmadrive');
		break;

	case 'connexion':
		//page pour se connecté
		if($co)
		{
			//si il est déja connecté, on le renvoie

			$_SESSION['alert'] = new Alert('erreur','Vous êtes déjà connecté');
			redirige('/ppe_pharmadrive');
		}

		//on vérifie la présence des chaines de caractère
		if(isset($_SESSION['login']) && empty($_SESSION['login']))
		{
			//le champ login est vide
			$_SESSION['alert'] = new Alert('danger','Erreur : le nom d\'utilisateur n\'a pas été renseigné');
		}
		else if(isset($_SESSION['pass']) && empty($_SESSION['pass']))
		{
			//le champ password est vide
			$_SESSION['alert'] = new Alert('danger','Erreur : le mot de passe n\'a pas été renseigné');
		}
		else
		{
			//tout est ok
			$form = array('login' => $_POST['login'], 'pass' => $_POST['pass']);
			require_once '../app/connexion.php';

			if($debug)
			{
				var_dump($_SESSION);
			}

			if($_SESSION['user']->isMedecin())
			{
				//si l'utilisateur est un médecin
				redirige('visite');
			}
			else
			{
				//sinon c'est un pharmacien
				redirige('ordonnance');
			}
		}
		
		break;

	default:
		//en cas de lien invalide, on redirige vers l'index
		if($debug)
		{
			var_dump($_GET);
		}
		else
		{
			$_SESSION['alert'] = new Alert('erreur','Cette page n\'existe pas');
			redirige('/ppe_pharmadrive');
		}
		
		break;
	}
}
else
{
	//on inclu le header
	require_once 'nav.php';
			
	if($medecin)
	{
		//si l'utilisateur est un médecin
		redirige('visite');
	}
	else if($pharmacien)
	{
		//si c'est un pharmacien
		redirige('ordonnance');
	}
	else
	{
		/*
			Plus besion grace au Form
		
		echo '<form class="form-signin" method="post" action="connexion">'.PHP_EOL;
		echo '	<h2 class="form-signin-heading">Connexion</h2>'.PHP_EOL;
		echo '	<input id="login" name="login" class="form-control" type="text" value="" placeholder="Nom d'utilisateur" require  autofocus />'.PHP_EOL;
		echo '	<input id="pass" name="pass" class="form-control" type="password" value="" placeholder="Mot de passe" require />'.PHP_EOL;
		echo '	<div class="form-group"><input id="submit" name="submit" class="btn btn-lg btn-primary btn-block" type="submit" value="Connexion" placeholder=""/>'.PHP_EOL;
		echo '	</div>'.PHP_EOL;
		echo '</form>'.PHP_EOL;
		//*/

		//Créer le fomulaire de connexion automatiquement
		$form = new FormSignin('connexion');
		$form->write();
	}

}

//on inclue le footer
require_once 'footer.php';
?>

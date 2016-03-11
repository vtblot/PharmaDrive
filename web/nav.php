<?php 

if(!isset($titre))
{
	//si on a pas renseillé le titre, on en met un de base
	$titre = 'Pharmadrive';
}
else
{
	$titre = ucfirst($titre);
}

 ?>

<html>
<head>
	<meta charset="utf-8" />
	<title><?=$titre?></title>

	<link rel="stylesheet" type="text/css" href="/ppe_pharmadrive_noob/web/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/ppe_pharmadrive_noob/web/css/connexion.css">
	<link rel="stylesheet" type="text/css" href="/ppe_pharmadrive_noob/web/css/style.css">
</head>

<body>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="/ppe_pharmadrive_noob/">Pharmadrive</a>
			<?php if($co)
			{
				//si l'utilisateur est connecté
				echo '<form class="navbar-form navbar-left" role="search">'.PHP_EOL;
        		echo '	<div class="form-group">'.PHP_EOL;
          		echo '		<input class="form-control" type="text">'.PHP_EOL;
        		echo '	</div>'.PHP_EOL;
        		echo '	<button type="submit" class="btn btn-primary">Rechercher</button>'.PHP_EOL;
     			echo '</form>'.PHP_EOL;
			} ?>
			
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<?php 
				if($co)
				{
					//si l'utilisateur est connecté
					if($medoc)
					{
						//si l'utilisateur est un médecin
						echo '<li><a href="/ppe_pharmadrive_noob/ordonnance">Ordonnances</a></li>'.PHP_EOL;
						echo '<li><a href="/ppe_pharmadrive_noob/visite">Visites</a></li>'.PHP_EOL;
					}
					else if($pharma)
					{
						//si l'utilisateur est un pharmacien
						echo '<li><a href="/ppe_pharmadrive_noob/comamnde">Commandes</a></li>'.PHP_EOL;
					}
					echo '<li><a href="/ppe_pharmadrive_noob/deconnexion">Déconnexion</a></li>'.PHP_EOL;
				}
				?>
			</ul>
		</div>
	</div>
</nav>

<div class="container">

<?php
	
	//on vérifie si on a un message a afficher
	if(isset($_SESSION['alert']) && !empty($_SESSION['alert']))
	{
		//si la variable exite et n'est pas vide
		$_SESSION['alert']->alert();
		$_SESSION['alert'] = null;
	}
 ?>



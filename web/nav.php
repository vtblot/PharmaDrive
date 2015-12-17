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
				echo '<form class="navbar-form navbar-left" role="search">';
        		echo '<div class="form-group">';
          		echo '<input class="form-control" type="text">';
        		echo '</div>';
        		echo '<button type="submit" class="btn btn-primary">Rechercher</button>';
     			echo '</form>';
			} ?>
			
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<?php 
					if($co)
					{
						if($medoc)
						{
							echo '<li><a href="/ppe_pharmadrive_noob/ordonnance">Ordonnances</a></li>';
							echo '<li><a href="/ppe_pharmadrive_noob/visite">Visites</a></li>';
						}
						else if($pharma)
						{
							echo '<li><a href="/ppe_pharmadrive_noob/comamnde">Commandes</a></li>';
						}
						echo '<li><a href="/ppe_pharmadrive_noob/deconnexion">Déconnexion</a></li>';
					}
					?>
				</ul>
		</div>
	</div>
</nav>

<div class="container">

<?php

	if(isset($_SESSION['alert']) && !empty($_SESSION['alert']))
	{
		//si la variable exite et n'est pas vide
		$_SESSION['alert']->alert();
		$_SESSION['alert'] = null;
	}
 ?>



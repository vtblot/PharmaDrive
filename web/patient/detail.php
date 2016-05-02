
<div class="jumbotron">
	<h1><?php echo $patient->getNom(),' ',$patient->getPrenom(); ?></h1>
	<p>
	<?php echo 'Adresse : ',$patient->getAdresse(),'<br/>','Ville : ',$patient->getVille(),'<br/>','Numéro de sécurité sociale : ',$patient->getNumSecu(); ?>
	</p>
</div>


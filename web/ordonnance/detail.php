
<div class="jumbotron">
	<?php
		if($pharmacien && !$ordonnance->estFinie())
		{
			?>
			<div class="btn-group-vertical" style="">
				<a class="btn btn-success" href="delivre/<?php echo $ordonnance->getId(); ?>">Ordonnance délivrée</a>
			</div>
			<?php
		}
	?>


	<form class="form-horizontal">

		<fieldset>
			<legend>Ordonnance du <?php echo $ordonnance->getJour()->format('d-m-Y'); ?></legend>
			<table style="width:100%" cellspacing="10">
				<tr>
					<td style="width:42%">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">Praticien</h3>
							</div>
							<div class="panel-body">
								<blockquote>
									<p><?php 
									echo "Prénom : ".$ordonnance->getVisite()->getMedecin()->getPrenom()." <br/>"."<br/>";
									echo "Nom : ".$ordonnance->getVisite()->getMedecin()->getNom(); ?></p>
									<small><?php echo "Fonction : ".ucfirst($ordonnance->getVisite()->getMedecin()->getFonction()); ?></small>
								</blockquote>
							</div>
						</div>
					</td>
					<td style="width:5%"></td>
					<td style="width:43%">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">Patient</h3>
							</div>
							<div class="panel-body">
								<blockquote>
									<p><?php 
									echo "Prénom : ".$ordonnance->getVisite()->getPatient()->getPrenom()." <br/>"."<br/>";
									echo "Nom : ".$ordonnance->getVisite()->getPatient()->getNom(); ?></p>
									<small><?php echo 'Adresse : ',$ordonnance->getVisite()->getPatient()->getAdresse(); ?></small>
									<small><?php echo 'Ville : ',$ordonnance->getVisite()->getPatient()->getVille(); ?></small>
									<small><?php echo 'Numéro de sécurité sociale : ',$ordonnance->getVisite()->getPatient()->getNumSecu(); ?></small>
								</blockquote>
							</div>
						</div>
					</td>
				</tr>
			</table>

			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Récapitulatif</h3>

				</div>
				<div class="panel-body">
					<strong>
					<?php 
					echo "<p>Médicament : ", $ordonnance->getMedicament()->getNom(),'</p>';
					echo "<p>Boites : ", $ordonnance->getQte(),'</p>';
					echo "<p>Observations : ", $ordonnance->getCommentaire(),'</p>'; 
					?>
					</strong>
				</div>
			</div>



		</fieldset>
	</form>
</div>



<div class="jumbotron">
	<form class="form-horizontal">
		
		<fieldset>
			<legend>Visite du <?php echo $visite->getdateVisite()?></legend>
			<a class="btn btn-primary float" href="../ordonnance/nouveau/<?php echo $visite->getId(); ?>">Ajouter une ordonnance</a>
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
									echo "Prénom : ".$visite->getMedecin()->getPrenom()." <br/>"."<br/>";
									echo "Nom : ".$visite->getMedecin()->getNom(); ?></p>
									<small><?php echo "Fonction : ".ucfirst($visite->getMedecin()->getFonction()); ?></small>
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
									echo 'Prénom : '.$visite->getPatient()->getPrenom().' <br/>'.'<br/>';
									echo 'Nom : '.$visite->getPatient()->getNom(); ?></p>
									<small><?php echo 'Adresse : ',$visite->getPatient()->getAdresse(); ?></small>
									<small><?php echo 'Ville : ',$visite->getPatient()->getVille(); ?></small>
									<small><?php echo 'Numéro de sécurité sociale : ',$visite->getPatient()->getNumSecu(); ?></small>
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
					echo 'Observations : ',$visite->getCommentaire(); 
					?>
					</strong>
				</div>
				<?php
					if(count($ordonnances)>1)
					{
						//si on trouve des ordonnances liées à cette visite

						echo '<div class="panel-body">';
							echo '<strong>Ordonnances :</strong>';
							include_once '../ordonnance/listeOrdo.php';
						echo '</div>';
					}
				?>
			</div>



		</fieldset>
	</form>
</div>


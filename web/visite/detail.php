
<div class="jumbotron">
	<form class="form-horizontal">

		<fieldset>
			<legend>Visite du <?php echo $visite->getdateVisite()?></legend>
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
									echo "Prénom : ".$visite->getPatient()->getPrenom()." <br/>"."<br/>";
									echo "Nom : ".$visite->getPatient()->getNom(); ?></p>
									<small><?php echo "NumSécu : ".$visite->getPatient()->getNumSecu()." ".$visite->getPatient()->getAdresse().$visite->getPatient()->getVille(); ?></small>
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
				<strong><p class="izi">
					<?php 
					echo "Observations - ";

					echo $visite->getCommentaire(); 
					?>
				</p></strong>
			</div>



		</fieldset>
	</form>
</div>


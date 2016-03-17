<table class="table table-striped table-hover tableau">
  <thead>
    <tr class="head">
      <th></th>
      <th>Nom</th>
      <th>Prenom</th>
      <th>Numéro de sécurité sociale</th>
    </tr>
  </thead>
  <tbody>

  	<?php foreach ($patients as $patient): ?>
  	<tr class="lien info" onclick="document.location='/ppe_pharmadrive_noob/patient/<?php echo $patient->getNom(); ?>_<?php echo $patient->getPrenom(); ?>'">
      	<td><?php echo $i++; ?></td>
        <!-- On met des liens si jamais l'utilisateur a désactiver le javascript -->
      	<td><a href="/ppe_pharmadrive_noob/patient/<?php echo $patient->getNom(); ?>_<?php echo $patient->getPrenom(); ?>"><?php echo $patient->getNom(); ?></a></td>
      	<td><a href="/ppe_pharmadrive_noob/patient/<?php echo $patient->getNom(); ?>_<?php echo $patient->getPrenom(); ?>"><?php echo $patient->getPrenom(); ?></a></td>
      	<td><a href="/ppe_pharmadrive_noob/patient/<?php echo $patient->getNom(); ?>_<?php echo $patient->getPrenom(); ?>"><?php echo $patient->getNumSecu(); ?></a></td>
    </tr>
  	<?php endforeach?>
    
   
  </tbody>
</table> 

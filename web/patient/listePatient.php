<table class="table table-striped table-hover ">
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
  	<tr class="lien info" onclick="document.location='/ppe_pharmadrive_noob/patient/<?=$patient->getNom()?>_<?=$patient->getPrenom()?>'">
      	<td><?=$i++?></td>
      	<td><a href="/ppe_pharmadrive_noob/patient/<?=$patient->getNom()?>_<?=$patient->getPrenom()?>"><?=$patient->getNom()?></a></td>
      	<td><a href="/ppe_pharmadrive_noob/patient/<?=$patient->getNom()?>_<?=$patient->getPrenom()?>"><?=$patient->getPrenom()?></a></td>
      	<td><a href="/ppe_pharmadrive_noob/patient/<?=$patient->getNom()?>_<?=$patient->getPrenom()?>"><?=$patient->getNumSecu()?></a></td>
    </tr>
  	<?php endforeach ?>
    
   
  </tbody>
</table> 

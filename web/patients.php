<?php

include_once 'nav.php';

$patients = $patientDao->selectAll();
$i = 1;

var_dump($_GET);

?>


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
  	<tr class="lien info" onclick="document.location='patients/<?=$patient->getNom()?>_<?=$patient->getPrenom()?>'">
      	<td><?=$i++?></td>
      	<td><a href="patients/<?=$patient->getNom()?>_<?=$patient->getPrenom()?>"><?=$patient->getNom()?></a></td>
      	<td><a href="patients/<?=$patient->getNom()?>_<?=$patient->getPrenom()?>"><?=$patient->getPrenom()?></a></td>
      	<td><a href="patients/<?=$patient->getNom()?>_<?=$patient->getPrenom()?>"><?=$patient->getNumSecu()?></a></td>
    </tr>
  	<?php endforeach ?>
    
   
  </tbody>
</table> 


<?php 

include_once 'footer.php';
?>

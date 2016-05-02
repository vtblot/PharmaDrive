<?php
  $i = 1;
?>
<table class="table table-striped table-hover tableau">
  <thead>
    <tr class="head">
    	<th></th>
     	<th>Patient</th>
      	<th>Date</th>
      	<th>Commentaire</th>
    </tr>
  </thead>
  <tbody>

    <?php foreach ($visites as $visite): ?>
    <tr class="lien info">
        <!-- On met des liens si jamais l'utilisateur a désactiver le javascript -->
      	<td onclick="document.location='/ppe_pharmadrive/visite/<?php echo $visite->getId(); ?>'"><?php echo $i++; ?></td>
      	<td onclick="document.location='/ppe_pharmadrive/patient/<?php echo $visite->getPatient()->getId(),'/',$visite->getPatient()->getNom(),'_',$visite->getPatient()->getPrenom(); ?>'"><?php echo $visite->getPatient()->getNom(),' ',$visite->getPatient()->getPrenom(); ?></td>
      	<td><?php echo $visite->getDateVisite(); ?></td>
      	<td onclick="document.location='/ppe_pharmadrive/visite/<?php echo $visite->getId(); ?>'"><?php echo $visite->getCommentaire(); ?></td>
    </tr>
    <?php endforeach ?>
   
  </tbody>
</table> 

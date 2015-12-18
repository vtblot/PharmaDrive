<a class="btn btn-primary float" href="visite/nouveau">Ajouter une visite</a>

<table class="table table-striped table-hover ">
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
      	<td onclick="document.location='/ppe_pharmadrive_noob/visite/<?=$visite->getId()?>'"><?=$i++?></td>
      	<td onclick="document.location='/ppe_pharmadrive_noob/patient/<?=$visite->getPatient()->getNom().'_'.$visite->getPatient()->getPrenom()?>'"><?=$visite->getPatient()->getNom().' '.$visite->getPatient()->getPrenom()?></td>
      	<td><?=$visite->getDateVisite()?></td>
      	<td onclick="document.location='/ppe_pharmadrive_noob/visite/<?=$visite->getId()?>'"><?=$visite->getCommentaire()?></td>
    </tr>
    <?php endforeach ?>
   
  </tbody>
</table> 

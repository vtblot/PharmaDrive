<table class="table table-striped table-hover ">
  <thead>
    <tr class="head">
      <th></th>
      <th>Date</th>
      <th>Medicament</th>
      <th>Nombre de boite</th>
    </tr>
  </thead>
  <tbody>

  	<?php foreach ($ordonnances as $ordonnance): ?>
  	<tr class="lien <?php echo ($ordonnance->getFini()==0)?'danger':'success' ?>" onclick="document.location='/ppe_pharmadrive_noob/ordonnance/<?php echo $ordonnance->getId(); ?>'">
      	<td><?php echo $i++; ?></td>
        <!-- On met des liens si jamais l'utilisateur a désactiver le javascript -->
      	<td><a href="/ppe_pharmadrive_noob/ordonnance/<?php echo $ordonnance->getId(); ?>"><?php echo $ordonnance->getJour()->format('d-m-Y'); ?></a></td>
      	<td><a href="/ppe_pharmadrive_noob/ordonnance/<?php echo $ordonnance->getId(); ?>"><?php echo $ordonnance->getMedicament()->getNom(); ?></a></td>
      	<td><a href="/ppe_pharmadrive_noob/ordonnance/<?php echo $ordonnance->getId(); ?>"><?php echo $ordonnance->getQte(); ?></a></td>
    </tr>
  	<?php endforeach ?>
    
   
  </tbody>
</table> 

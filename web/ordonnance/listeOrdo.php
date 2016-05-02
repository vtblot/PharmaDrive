<table class="table table-striped table-hover tableau">
  <thead>
    <tr class="head">
      <th></th>
      <th>Date</th>
      <th>Medicament</th>
      <th>Nombre de boite</th>
      <?php
          if($pharmacien)
          {
            echo '<th>Délivré par</th>';
          }
        ?>
    </tr>
  </thead>
  <tbody>

  	<?php foreach ($ordonnances as $ordonnance): ?>
  	<tr class="lien <?php echo ($ordonnance->estFinie())?'success':'danger' ?>" onclick="document.location='/ppe_pharmadrive/ordonnance/<?php echo $ordonnance->getId(); ?>'">
      	<td><?php echo $i++; ?></td>
        <!-- On met des liens si jamais l'utilisateur a désactiver le javascript -->
      	<td><a href="/ppe_pharmadrive/ordonnance/<?php echo $ordonnance->getId(); ?>"><?php echo $ordonnance->getJour()->format('d-m-Y'); ?></a></td>
      	<td><a href="/ppe_pharmadrive/ordonnance/<?php echo $ordonnance->getId(); ?>"><?php echo $ordonnance->getMedicament()->getNom(); ?></a></td>
      	<td><a href="/ppe_pharmadrive/ordonnance/<?php echo $ordonnance->getId(); ?>"><?php echo $ordonnance->getQte(); ?></a></td>
        <?php
          if($pharmacien)
          {
            if($ordonnance->estFinie())
            {
              $pharma = $userDao->select($ordonnance->getIdPharmacien());
              echo '<td>',$pharma->getNom(),' ',$pharma->getPrenom(),'</a></td>';
            }
            else{
              echo '<td></a></td>';
            }
          }
        ?>
    </tr>
  	<?php endforeach ?>
    
   
  </tbody>
</table> 

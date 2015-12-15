<?php 

include_once 'nav.php';


if(!$medoc)
{
	//si il est pas medecin, on le renvoie à l'aceuil
	redirige('index');
}

$visites = $visiteDao->selectForMedecin($_SESSION['user']);
$i = 1;

if(isset($_GET['nom']) and isset($_GET['prenom']))
{
  //on a renseillé un patient précis

}
else
{

?>
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
      	<td onclick="document.location='visites/<?=$visite->getId()?>'"><?=$i++?></td>
      	<td onclick="document.location='patients/<?=$visite->getPatient()->getNom().'_'.$visite->getPatient()->getPrenom()?>'"><?=$visite->getPatient()->getNom().' '.$visite->getPatient()->getPrenom()?></td>
      	<td><?=$visite->getDateVisite()?></td>
      	<td onclick="document.location='visites/<?=$visite->getId()?>'"><?=$visite->getCommentaire()?></td>
    </tr>
    <?php endforeach ?>
   
  </tbody>
</table> 


<?php 
}


include_once 'footer.php';
?>

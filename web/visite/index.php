<?php 

include_once '../nav.php';


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
  //sinon on liste les visites du médecin
  include_once 'listeVisite.php';
}


include_once '../footer.php';
?>

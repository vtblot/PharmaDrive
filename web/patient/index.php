<?php

include_once '../nav.php';

if(!$medoc)
{
  //si il est pas medecin, on le renvoie à l'aceuil
  redirige('index');
}

$patients = $patientDao->selectAll();
$i = 1;

var_dump($_GET);

if(isset($_GET['id']))
{
  //on a renseillé un patient précis

}
else
{
  //sinon on liste les visites du médecin
  include_once 'listePatient.php';
}


include_once '../footer.php';
?>

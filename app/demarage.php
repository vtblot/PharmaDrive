<?php 

//on charge le fichier contenant les fonctions
require_once 'fonctions.php';

//Pour le chargement automatique des classes
require_once 'classes/Autoloader.php';
Autoloader::autoload();

//on demare la session
session_start();

//on se connecte à la base de données
$pdo = new DataBase('pharmadrive');

$userDao = new UserDAO($pdo);
$patientDao = new PatientDAO($pdo);
$visiteDao = new VisiteDAO($pdo);
$medicamentDao = new MedicamentDAO($pdo);
$ordonnanceDao = new OrdonnanceDAO($pdo);

if(isset($_SESSION))
	var_dump($_SESSION);



//On identifie l'utilisateur
$co = false;
$medoc = false;
$pharma = false;


if(isset($_SESSION['user']) && !empty($_SESSION['user']))
{
	//si la variable user est renseignée
	if($_SESSION['user']->isAuthentified())
	{
		//si il est connecté
		$co = true;

		if($_SESSION['user']->isMedecin())
		{
			$medoc = true;
		}
		else if($_SESSION['user']->isPharmacien())
		{
			$pharma = true;
		}
	}

}

?>

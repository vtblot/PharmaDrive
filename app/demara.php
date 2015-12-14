<?php 

//on charge le fichier contenant les fonctions
include_once 'fonctions.php';

//Pour le chargement automatique des classes
require 'classes/Autoloader.php';
Autoloader::autoload();

//on demare la session
session_start();

//on se connecte à la base de données
$pdo = new DataBase('pharmadrive');


$userDao = new UserDao($pdo);
$patientDao = new PatientDao($pdo);
$visiteDao = new VisiteDao($pdo);


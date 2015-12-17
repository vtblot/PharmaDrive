# /app
background de l'application

## classes/
Classe de l'application

### connexion.php
Fichier appelé par le controleur principal

Créer la session 'user' 

### deconnexion.php
Fichier appelé par le controleur principal pour se connecter

Supprime la session 'user'

### demarage.php
Fichier appelé au debut de tous les fichiers (vue et app)

* Crée l'autoloader
* demare la session
* crée les DAO
* Détermine le statut de l'utilisateur (inconnu/medecin/pharmacien)

### fonction.php
Receuil de fonction utilisées

Ce fichier a vocation a disparaitre et les fonctions qu'il contient iront dans des classes

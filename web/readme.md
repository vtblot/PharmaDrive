# /web
Front de l'application

## css/
Contient les fichiers CSS utilisés

## js/
Contient les fichiers JS utilisés

### .htacess
Gère les redirections et accès URL de l'application

### footer.php
Pied de page

Chargé en bas de chaque page

### index.php
Page d'acceuil

Contient le formulaire de connexion si l'utilisateur n'est pas connecté. Sinon afficher les dernières visites pour les medecins et les dernières ordonnances reçues pour le pharmacien

### nav.php
En tête de page.

* Appelle le /app/demarage.php pour les variables
* Détermine le statut de l'utilisateur (inconnu/medecin/pharmacien)
* Affiche la barre de navigation

### patients.php
Page affichant les patients enregistrés

### visites.php
Page affichant les visites effectuées pas le médecin

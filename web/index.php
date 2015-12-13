<?php

include_once 'nav.php';

$form = new Form(array('name' => 'Julien' ));
/*
echo $form->input("name");
echo $form->input("mdp");
echo $form->subit();*/

if(!$co)
{
	echo '<form class="form-signin" method="post" action="../app/connexion.php">';
	echo '<fieldset>';
	echo '<h2 class="form-signin-heading">Connexion</h2>';
	echo '<label for="mail" class="sr-only">Login</label>';
	echo '<input type="text" id="mail" name="mail" class="form-control" placeholder="Nom d\'utilisateur" autofocus>';
	echo '<label for="pass" class="sr-only">Mot de passe</label>';
	echo '<input type="password" id="pass" name="pass" class="form-control" placeholder="Mot de passe" >';
	echo '</fieldset>';
	echo '<input class="btn btn-lg btn-primary btn-block" type="submit" value="Connexion"/>';
	echo '</form>';
}
else
{
	?>
	<ul>
		<li>Patients : reste a faire la page du patient</li>
		<li>Visites : reste les pages uniques</li>
	</ul>

	<?php 
}
?>





<?php 

include_once 'footer.php';
?>

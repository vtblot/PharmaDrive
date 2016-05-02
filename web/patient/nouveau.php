<form class="new form-horizontal" method="post">
<fieldset>
  <legend>Ajouter un patient</legend>



	<div class="form-group">
      <label for="nom" class="col-lg-2 control-label">Nom</label>
      <div class="col-lg-10">
        <input class="form-control" id="nom" name="nom" type="text">
      </div>
  	</div>
  	<div class="form-group">
      	<label for="prenom" class="col-lg-2 control-label">Prenom</label>
	    <div class="col-lg-10">
	     	<input class="form-control" id="prenom" name="prenom" type="text">
	    </div>
  	</div>
  	<div class="form-group">
      	<label for="secu" class="col-lg-2 control-label">Numéro de sécurité sociale</label>
      	<div class="col-lg-10">
        	<input class="form-control" id="secu" name="secu" type="text">
      	</div>
  	</div>
    <div class="form-group">
        <label for="ville" class="col-lg-2 control-label">Ville</label>
        <div class="col-lg-10">
          <input class="form-control" id="ville" name="ville" type="text">
        </div>
    </div>
  	<div class="form-group">
    	<label for="adresse" class="col-lg-2 control-label">Adresse</label>
    	<div class="col-lg-10">
      		<textarea class="form-control" rows="3" id="adresse" name="adresse"></textarea>
   		</div>
  	</div>
  	<div class="form-group">
    	<div class="col-lg-10 col-lg-offset-2">
      		<button type="reset" class="btn btn-default">Réinitialiser</button>
      		<button type="submit" class="btn btn-primary">Créer</button>
    		</div>
  		</div>
  	</div>
</fieldset>
</form>


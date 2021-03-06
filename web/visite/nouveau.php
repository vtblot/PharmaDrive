<form class="new form-horizontal" method="post">
<fieldset>
  <legend>Ajouter une visite</legend>

  <div class="form-group">
      <label for="select" class="col-lg-2 control-label">Patient</label>
      <div class="col-lg-10">
        <select class="form-control" id="patient" name="patient">
          <?php foreach ($patients as $patient): ?>
            <option value="<?=$patient->getId()?>"><?=$patient->getNom().' '.$patient->getPrenom()?></option>
          <?php endforeach ?>
        </select>
      </div>
    </div>

  <div class="form-group">
    <label for="textArea" class="col-lg-2 control-label">Commentaires</label>
    <div class="col-lg-10">
      <textarea class="form-control" rows="3" id="commentaire" name="commentaire"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-10 col-lg-offset-2">
      <button type="reset" class="btn btn-default">Réinitialiser</button>
      <button type="submit" class="btn btn-primary">Créer</button>
  </div>
  </fieldset>
</form>

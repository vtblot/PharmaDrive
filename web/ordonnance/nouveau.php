<form class="form-horizontal">
<fieldset>
  <legend>Ordonnance</legend>
  <legend class="legend2">Patient</legend>
  <div class="form-group">
    <label for="select" class="col-lg-2 control-label">Nom</label>
    <div class="col-lg-10">
      <select class="form-control" id="select">
        <?php foreach ($patients as $patient): ?>
          <option value="<?=$patient->getId()?>"><?=$patient->getNom().' '.$patient->getPrenom()?></option>
        <?php endforeach ?>
      </select>
    </div>
  </div>
    
  <div class="form-group">
    <label for="textArea" class="col-lg-2 control-label">Observation particulière</label>
    <div class="col-lg-10">
      <textarea class="form-control" rows="3" id="textArea"></textarea>
      <span class="help-block">Ici, indiquez des symptômes particuliers ou observations semblant importants à historiser (non obligatoire)</span>
    </div>
  </div>

  <legend class="legend2">Prescription</legend>
  <div class="form-group">
    <label for="select" class="col-lg-2 control-label">Nom</label>
    <div class="col-lg-10">
      <select class="form-control" id="select">
        <?php foreach ($medicaments as $medicament): ?>
          <option value="<?=$patient->getId()?>"><?=$medicament->getNom()?></option>
        <?php endforeach ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="select" class="col-lg-2 control-label">Médicaments</label>
    <div class="col-lg-10">
      <textarea class="form-control" rows="2" id="textArea" placeholder="Ici, veuillez indiquez les doses prescrites."></textarea>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-10 col-lg-offset-2">
      <button type="reset" class="btn btn-default">Annuler</button>
      <button type="submit" class="btn btn-primary">Valider</button>
    </div>
  </div>
  </fieldset>
</form>

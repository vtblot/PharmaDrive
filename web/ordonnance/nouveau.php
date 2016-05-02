<form class="form-horizontal" method="post">
<fieldset>
  <legend class="legend2">Prescription</legend>
  <input type="hidden" id="visite" name="visite" value="<?php echo $id; ?>" />
  <div class="form-group">
    <label for="medicament" class="col-lg-2 control-label">Médicament</label>
    <div class="col-lg-10">
      <select class="form-control" id="medicament" name="medicament">
        <option value="vide"></option>
        <?php foreach ($medicaments as $medicament): ?>
          <option value="<?=$medicament->getId()?>"><?php echo $medicament->getNom(); ?></option>
        <?php endforeach ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="qte" class="col-lg-2 control-label">Nombre de boite</label>
    <div class="col-lg-10">
      <input type="number" id="qte" name="qte"/>
    </div>
  </div>
  <div class="form-group">
    <label for="qte" class="col-lg-2 control-label">Commentaire</label>
    <div class="col-lg-10">
      <textarea class="form-control" rows="3" id="commentaire" name="commentaire" placeholder=""></textarea>
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

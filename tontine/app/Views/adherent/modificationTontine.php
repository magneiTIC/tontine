<div class="row g-5">
    <div class="col-12">
        <h1> Modifier une tontine</h1>
<?php if(isset($validation)): ?>
      <div class="row alert alert-danger ">
        <?= $validation->listErrors();  ?>
      </div>

<?php  endif ?>
        <form method="post"  class="needs-validation" novalidate action="">
<?php form_hidden('id',isset($tontine["idTontine"])? $tontine["idTontine"]:set_value("id") ) ?>
        <div class="row g-3">
        <div class="col-sm-6">
            <label for="label" class="form-label">label</label>
            <?= form_input(['name'=>'label','class'=>'form-control','placeholder'=>'saisir le label','value'=>isset($tontine["nom"])? $tontine["idTontine"]:set_value("nom")]) ?>    
        </div>
        <div class="col-sm-6">
            <label for="periodicite" class="form-label">Periodicite</label>
            <?= form_dropdown('periodicite',$periodicite,isset($tontine["periodicite"])? $tontine["periodicite"]:set_value("periodicite"),["class"=>"form-control"]); ?>
        </div>

        <div class="col-6">
            <label for="dateDeb" class="form-label">Date debut</label>
            <!--  form_input(['name'=>'dateDeb','class'=>'form-control','placeholder'=>'jj/mm/AAAA','value'=>set_value("dateDeb")]) ?>     -->
            <input type="date" name="dateDeb" class="form-control" value=<?php isset($tontine["dateDebut"])? $tontine["idTontine"]:set_value('dateDeb')?> >
        </div>
        <div class="col-sm-6">
        <label for="nbEcheance" class="form-label">nb Echeances</label>
            <?= form_dropdown('nbEcheance',isset($tontine["nbEcheance"])? $tontine["nbEcheance"]:$nbEcheance,set_value("nbEcheance"),["class"=>"form-control"]); ?>

        </div>
        </div>
        <hr>
        <?= form_submit(['name'=>'ajouter','class'=>'w-100 btn btn-primary btn-lg','value'=>'ajouter']) ?>

        </form>
    </div>
</div>
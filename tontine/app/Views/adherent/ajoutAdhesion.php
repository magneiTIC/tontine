<div class="row g-5">
    <div class="col-12">
        <h1> Adherer a  une tontine</h1>
<?php if(isset($validation)): ?>
      <div class="row alert alert-danger ">
        <?= $validation->listErrors();  ?>
      </div>

<?php  endif ?>

<?php if(session()->get("successAjoutAdhesion")): ?>
      <div class="row alert alert-success ">
        <?= session()->get("successAjoutAdhesion") ?>
      </div>
<?php  endif ?>

        <form method="post"   action="">

        <div class="row g-3">
            <div class="col-sm-6">
                <?= form_hidden("idTontine",isset($idTontine)?$idTontine:set_value("idTontine")); ?>


                <label for="montant" class="form-label">Montant</label>
                <?= form_input(['name'=>'montant','class'=>'form-control','placeholder'=>'saisir le montant','value'=>set_value("nom")]) ?>    
            </div>
        </div>
        <hr>
        <div class="my-4">
        <?= form_submit(['name'=>'adherer','class'=>'w-100 btn btn-primary btn-lg','value'=>'adherer']) ?>

        </div>

        </form>
    </div>
</div>
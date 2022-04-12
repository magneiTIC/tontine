<h1> Bienvenue <?= session()->get('prenom') ." ".session()->get('nom') ?></h1>
<p class="fs-5 col-md-8">
    Vous pouvez gerer vos tontines, adherer aux tontines disponibles, creer de nouvelles tontines,...
</p>
<h2> Les tontines gerees
<a href="<?= base_url() ?>/adherent/ajoutTontine" class="btn btn-success">
    Nouvelle tontine
</a>
</h2>

<?php if(session()->get("successAjoutTontine")): ?>
      <div class="row alert alert-success ">
        <?= session()->get("successAjoutTontine") ?>
      </div>

<?php  endif ?>

<table class="table"> 
    <tr>
        <th></th>
        <th> Label</th>
        <th>Periodicite </th>
        <th>Date de  debut</th>
        <th>nb echeances </th>
        <th></th>
    </tr>
    <?php if(! $listeTontineResp): ?>
        <tr>
            <td colspan="5" class="table-danger text-center">
                Aucune tontine geree pour l'instant
            </td>
        </tr>
    <?php else : 
            foreach ($listeTontineResp as $tontine ):
    ?>
    <tr>
        <td></td>
        <td> <?=$tontine['nom'] ?> </td>
        <td> <?=$tontine['periodicite'] ?> </td>
        <td>  <?=$tontine['dateDebut'] ?></td>
        <td> <?=$tontine['nbEcheance'] ?> </td>
        <td>
            <a href="<?= base_url() ?>/adherent/modifTontine/<?= $tontine['idTontine'] ?>" class="btn btn-warning">Modifier</a>
            <a onclick="return confirm('voulez vous vraiment supprimer la tontine<?= $tontine['nom']?>' )" href="<?= base_url() ?>/adherent/suppTontine/<?= $tontine['idTontine'] ?>" class="btn btn-danger">Supprimer</a>
            <a href="<?= base_url() ?>/adherent/tontine/<?= $tontine['idTontine'] ?>" class="btn btn-info">Participants</a>

        </td>

    </tr>
    <?php
            endforeach ;
    endif 
    ?>
</table>
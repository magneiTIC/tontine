<h1> Detail tontine <?= $maTontine['nom'] ?></h1>
<a href="<?= base_url() ?>/adherent" class="btn btn-success">Revenir a la liste</a>
<hr>
<div class="card mb-3">
    <div class="card-header">
        Description <?= $maTontine["nom"]?>
    </div>
    <div class="card-body">
        <p class="card-title"> Debut: <?= $maTontine['dateDebut']?> </p>
        <p> Nombre d'echeances prevues: <?= $maTontine['nbEcheance']?> echeances
            <a href="<?= base_url() ?>/adherent/genererEcheance/<?= $maTontine['idTontine']?>" class="btn btn-success">Generer</a>
        </p>    
        <p>
            <?php foreach($echeances as $echeance):?>
                <span class="badge rounded-pill bg-primary"> 
                    <?= date_format(date_create($echeance['date']),'d/m/Y')?>
                </span>
            <?php endforeach ?>

        </p>

<?php if(session()->get("successAjoutEcheance")): ?>
    <div class="row alert alert-success ">
        <?= session()->get("successAjoutEcheance") ?>
    </div>
<?php endif ?>
   
    </div>
</div>

<div class="card">
    <div class="card-header">
        Les participants
    </div>
    <div class="card-body">
        <?php if(! $participants) :?>
            <p>Aucun participant </p>
        <?php else: ?>
            <ul class="list-group">
                <?php foreach($participants as $participant): ?>
                    <li class="list-group-item">
                        <h5 class="mb-1"> <?= $participant["prenom"]."  ".$participant["nom"] ?> </h5>
                        <p> Cotisation: <?= $participant["montant"]?> CFA </p>
                       
                        <?php if(session()->get("successAjoutCotise")): ?>
                            <div class="row alert alert-success ">
                                <?= session()->get("successAjoutCotise") ?>
                            </div>
                        <?php endif ?>

                        <?php 
                            $i=0;
                            if(isset($cotisations[$participant["idAdherent"]])):
                                for ($i=0; $i < $cotisations[$participant['idAdherent']]; $i++) :
                        ?>
                        <span class="badge rounded-pill bg-success"> <?= date_format(date_create($echeances[$i]['date']),'d/m/Y')?> </span>
                        <?php 
                             endfor;
                             endif;
                        ?>
                        <p class="mt-3">
                            <a class="btn btn-warning" 
                            href="<?= base_url()?>/adherent/payerEcheance/<?= $participant["idAdherent"] ?>/<?= $maTontine['idTontine']?>/<?= $i+1?>">
                              Payer
                            </a>
                        </p>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif ?>
    </div>
</div>

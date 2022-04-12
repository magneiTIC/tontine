<h1> Adherer a une tontine</h1>
<p class="fs-5 col-md-8"> Vous pouvez adherer aux tontines suivantes:</p>

<h2>Les tontines disponibles</h2>
<table class="table"> 
    <tr>
        <th></th>
        <th> Label</th>
        <th>Periodicite </th>
        <th>Date de  debut</th>
        <th>nb echeances </th>
        <th></th>
    </tr>
    <?php if(! $listeTontines): ?>
        <tr>
            <td colspan="5" class="table-danger text-center">
                Aucune tontine disponible
            </td>
        </tr>
    <?php else : 
            foreach ($listeTontines as $tontine ):
    ?>
    <tr>
        <td></td>
        <td> <?=$tontine['nom'] ?> </td>
        <td> <?=$tontine['periodicite'] ?> </td>
        <td>  <?=$tontine['dateDebut'] ?></td>
        <td> <?=$tontine['nbEcheance'] ?> </td>
        <td>
            <a href="<?= base_url() ?>/adherent/adhererTontine/<?= $tontine['idTontine'] ?>" class="btn btn-warning">Adherer</a>
           
        </td>

    </tr>
    <?php
            endforeach ;
    endif 
    ?>
</table>
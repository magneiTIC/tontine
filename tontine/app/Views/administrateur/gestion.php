<h1>La liste des utilisateurs</h1>
table class="table"> 
    <tr>
        <th></th>
        <th>Prenom </th>
        <th> Nom</th>
        <th>Login</th>
        <th></th>
    </tr>
    <?php if(! $listeUser): ?>
        <tr>
            <td colspan="5" class="table-danger text-center">
                Aucun utilisateur disponible
            </td>
        </tr>
    <?php else : 
            foreach ($listeUser as $user ):
    ?>
    <tr>
        <td></td>
        <td> <?=$user['nom'] ?> </td>
        <td> <?=$user['prenom'] ?> </td>
        <td>  <?=$user['login'] ?></td>
        <td>
            <a href="<?= base_url() ?>/administrateur/MDP/<?= $user['idAdherent'] ?>" class="btn btn-warning">Reinitialiser MDP</a>
           
        </td>

    </tr>
    <?php
            endforeach ;
    endif 
    ?>
</table>
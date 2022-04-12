<h1> Reinitialisation du mot de passe</h1>

<form action="" method="post">

    <div class="row">
                <div class="col">
                <label for="motPasse" class="form-label">Nouveau Mot de passe</label>
                <input type="password"  name="motPasse" class="form-control" placeholder="Saisir le mot de passe" aria-label="First name"  required>
                <div class="invalid-feedback">
                    Le Mot de passe est obligatoire
                </div>
                </div>
                <div class="col">
                <label for="motPasseConf" class="form-label"> Confirmation du nouveau Mot de passe</label>
                <input type="password"  name="motPasseConf " class="form-control" placeholder="Confirmer le mot de passe" aria-label="Last name"  required>
                <div class="invalid-feedback">
                    La confirmation du mot de passe est obligatoire
                </div>
                </div>
    </div>
         
          <hr class="my-4">
          <button class="w-100 btn btn-primary btn-lg" type="submit"> S'inscrire</button>

</form>
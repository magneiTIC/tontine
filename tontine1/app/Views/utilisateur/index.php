
    <h1>Connexion </h1>
    <?php if(isset($validation)): ?>
      <div class="row alert-danger alert">
        <?= $validation->listErrors();  ?>
      </div>

    <?php  endif ?>

    <?php  if(session()->get('success')): ?>
      <div class="alert-success alert">
        <?= session()->get('success') ;        ?>
       
      </div>
     
    <?php endif ?>

    <?php  if(session()->get('nonAutorise')): ?>
      <div class="alert-danger danger">
        <?= session()->get('nonAutorise') ?>
      </div>
    <?php endif ?>
  
    
    <form method="post">
    <h1 class="h3 mb-3 fw-normal">Entrez vos login et mot de passe</h1>

    <div class="form-floating">
      <input type="text" name="login" value="<?= set_value("login ") ?>" class="form-control" id="floatingInput" placeholder="nom@example.com">
      <label for="floatingInput">Login </label>
    </div>
    <div class="form-floating">
      <input type="password" name="motPasse" class="form-control" id="floatingPassword" placeholder="Mot de passe">
      <label for="floatingPassword">Mot de Passe </label>
    </div>

     
    <button class="w-100 btn btn-lg btn-primary" type="submit">Se connecter</button>
  </form>

    <h1>Inscription </h1>
    <p class="fs-5 col-md-8">
      Veuillez remplir le formulaire suivant pour vous inscrire
    </p>
    <div class="row g-5">
      <div class="col-12">
        <?php 
          if (isset($validation)):
        ?>
        <div class="row alert alert-danger">
            <?= $validation->listErrors(); ?>
        </div>
        <?php endif; ?>
        <h4> Creer un compte </h4>
        <form method="post"  class="needs-validation" novalidate action="">

          <div class="row">
            <div class="col">
              <label for="prenom" class="form-label">Prenom</label>
              <input type="text" name="prenom" value="<?= set_value("prenom")?>" id="prenom" class="form-control" placeholder="Saisir le prenom"  required>
              <div class="invalid-feedback">
                Le prenom est obligatoire
              </div>
            </div>
            <div class="col">
             <label for="nom" class="form-label">Nom</label>
              <input type="text" name="nom" value="<?= set_value("nom")?>"class="form-control" placeholder="Saisir le nom" aria-label="Last name" required>
              <div class="invalid-feedback">
                Le nom est obligatoire
              </div>
            </div>
          </div>
         


          <br>
    
          
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Login </label>
            <input type="text"  name="login" value="<?= set_value("login")?>" class="form-control" placeholder="Saisir le login" id="exampleInputEmail1"   required >
          </div>

          <div class="row">
            <div class="col">
              <label for="motPasse" class="form-label">Mot de passe</label>
              <input type="password"  name="motPasse" class="form-control" placeholder="Saisir le mot de passe" aria-label="First name"  required>
              <div class="invalid-feedback">
                Le Mot de passe est obligatoire
              </div>
            </div>
            <div class="col">
              <label for="motPasseConf" class="form-label"> Confirmation du Mot de passe</label>
              <input type="password"  name="motPasseConf " class="form-control" placeholder="Confirmer le mot de passe" aria-label="Last name"  required>
              <div class="invalid-feedback">
                La confirmation du mot de passe est obligatoire
              </div>
            </div>
          </div>
         
          <hr class="my-4">
          <button class="w-100 btn btn-primary btn-lg" type="submit"> S'inscrire</button>

        </form>
      </div>
    </div>

<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation1 ')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
    
  
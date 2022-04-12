<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Starter Template · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/starter-template/">

    

    <!-- Bootstrap core CSS -->
<?= link_tag('css/bootstrap.min.css') ;?>
    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
  </head>
  <body>
    
<div class="col-lg-8 mx-auto p-3 py-md-5">
<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="<?= base_url(); ?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <?= img('img/logo.jpg'); ?>
      </a>

      <ul class="nav nav-pills">
      <li class="nav-item"><a href="<?= base_url() ?>" class="nav-link active" aria-current="page">Acceuil</a></li>
        <li class="nav-item"><a href="<?= base_url() ?>/utilisateur/inscription" class="nav-link">Inscription</a></li>
        <li class="nav-item"><a href="<?= base_url() ?>/utilisateur" class="nav-link">Connexion</a></li>
        <li class="nav-item"><a href="<?= base_url() ?>/quisommesnous" class="nav-link">Qui sommes nous?</a></li>
      </ul>
    </header>

  <main>
    <h1>Nous contacter </h1>
    <p class="fs-5 col-md-8">
      Vous pouvez nous contacter
	</p>

    <div class="mb-5">
      <a href="<?= base_url(); ?>/utilisateur/inscription" class="btn btn-primary btn-lg px-4">S'inscrire </a>
    </div>

    <hr class="col-3 col-md-2 mb-5">

    <div class="row g-5">
      <div class="col-md-6">
        <h2>Starter projects</h2>
        <p>Ready to beyond the starter template? Check out these open source projects that you can quickly duplicate to a new GitHub repository.</p>
        <ul class="icon-list">
          <li><a href="https://github.com/twbs/bootstrap-npm-starter" rel="noopener" target="_blank">Bootstrap npm starter</a></li>
          <li class="text-muted">Bootstrap Parcel starter (coming soon!)</li>
        </ul>
      </div>
	  <div class="col-md-6">
        <h2>Guides</h2>
        <p>Read more detailed instructions and documentation on using or contributing to Bootstrap.</p>
        <ul class="icon-list">
          <li><a href="/docs/5.1/getting-started/introduction/">Bootstrap quick start guide</a></li>
          <li><a href="/docs/5.1/getting-started/webpack/">Bootstrap Webpack guide</a></li>
          <li><a href="/docs/5.1/getting-started/parcel/">Bootstrap Parcel guide</a></li>
          <li><a href="/docs/5.1/getting-started/contribute/">Contributing to Bootstrap</a></li>
        </ul>
      </div>
    </div>
  </main>
  <footer class="pt-5 my-5 text-muted border-top">
    Created by the Bootstrap team &middot; &copy; 2021
  </footer>
</div>


<?= script_tag('js/bootstrap.bundle.min.js') ;?>
      
  </body>
</html>
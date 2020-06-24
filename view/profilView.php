<?php ob_start(); ?>

<div class="landscape">
  <div class="bg-black">
    <div class="row no-gutters">
      <div class="col-md-6 full-height bg-white">
        <div class="auth-container">
        <div class="row d-flex justify-content-end mr-4">
            <div>
                <a href="/Ec_code2020" class="btn btn-dark">X</a>
            </div>
        </div>
          <h2><span>Cod</span>'Flix</h2>
          <h3>Mon profil</h3>
          <h3>Compte: <?= $user['email'] ?></h3>

          <form method="post" action="index.php?redirectTo=profil" class="custom-form">

            <div class="form-group">
              <label for="email">Entrez un nouvel email pour le changer</label>
              <input type="email" name="email" value="" placeholder="exemple@gmail.com" id="email" class="form-control" />
            </div>
            <div class="form-group d-flex justify-content-center">
                <span>Modification du mot de passe</span>
            </div>
            <div class="form-group">
              <input type="password" name="actual_password" id="password" placeholder="Mot de passe actuel" class="form-control" />
            </div>
            <div class="form-group">
              <input type="password" name="new_password" id="password" placeholder="Nouveau mot de passe" class="form-control" />
            </div>
            <div class="form-group">
              <input type="password" name="confirm_password" id="password" placeholder="Confirmation du nouveau mot de passe" class="form-control" />
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <a href="index.php?redicrect=signup" class="btn btn-block bg-red">Supprimer le compte</a>
                </div>
                <div class="col-md-6">
                  <input type="submit" name="Valider" class="btn btn-block bg-blue" />
                </div>
              </div>
            </div>

            <span class="error-msg">
              <?= isset( $error_msg ) ? $error_msg : null; ?>
            </span>
            <span class="success-msg">
              <?= isset( $success_msg ) ? $success_msg : null; ?>
            </span>
          </form>
        </div>
      </div>
      <div class="col-md-6 full-height">
        <div class="auth-container">
          <h1>Voici votre espace profil</h1>
        </div>
      </div>
    </div>
  </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('base.php'); ?>

<?php
require_once("base/class/main.php");


if (isset($_POST['connexion'])) {
  if (empty(Connexion::verif($_POST['mail'], $_POST['mdp']))) {
    $errorConnexion[1] = '<div class="alert alert-danger" role="alert">La combinaison email et mot de passe n\'est pas bonne.</div>';
  }
  else {
    $idUtilisateur = Connexion::verif($_POST['mail'], $_POST['mdp']);
    $_SESSION['id_utilisateur'] = $idUtilisateur['ID'];
    header('Location: profil.php?id='.$_SESSION['id_utilisateur'].'');
  }
}

if ($_GET['deconnect'] == 1) {
  session_destroy();
}

echo $_SESSION['id_utilisateur'];
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <link rel="stylesheet" type="text/css" href="<?php echo Settings::sitePathRoot; ?>base/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Settings::sitePathRoot; ?>base/css/signin.css"/>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="post" class="needs-validation form-signin" novalidate>
      <img class="mb-4">
      <h1 class="h3 mb-3 font-weight-normal">Se connecter</h1>
      <?php if (!empty($errorConnexion[1])) { echo $errorConnexion[1]; } ?>
      <label for="inputEmail" class="sr-only">Adresse email</label>
      <input type="email" id="inputEmail" name="mail" class="form-control" placeholder="Adresse email" required autofocus>
      <label for="inputPassword" class="sr-only">Mot de passe</label>
      <input type="password" id="inputPassword" name="mdp" class="form-control" placeholder="Mot de passe" required>
      <a href="oublimdp.php">Mot de passe oublié ?</a>
      <a class="link-inscription" href="inscription.php">S'inscrire</a>
      <div class="invalid-feedback">Veuillez-renseigner un email valide.</div>
      <div class="invalid-feedback">Votre mot de passe ne peut-être vide.</div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="connexion">Connexion</button>
      <p class="text-muted">&copy; 2019 - My Campus</p>
    </form>

    <script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

  </body>
</html>

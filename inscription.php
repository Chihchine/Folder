<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/inscription.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="needs-validation form-signin" novalidate>
      <img class="mb-4">
      <h1 class="h3 mb-3 font-weight-normal">Inscription</h1>
      <div class="form">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Prénom</label>
            <input class="form-control" type="text" name="" value="" placeholder="Prénom" required>
            <div class="invalid-feedback">Veuillez-renseigner votre prénom.</div>
          </div>
          <div class="form-group col-md-6">
            <label for="">Nom</label>
            <input class="form-control" type="text" name="" value="" placeholder="Nom" required>
            <div class="invalid-feedback">Veuillez-renseigner votre nom.</div>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="">Email</label>
            <input class="form-control" type="email" name="" value="" placeholder="Email de votre école" required>
            <div class="invalid-feedback">Veuillez-renseigner un email valide.</div>
          </div>
          <div class="form-group col-md-4">
            <label for="">Mot de passe</label>
            <input class="form-control" type="password" name="" value="" placeholder="*********" required minlength="5">
            <div class="invalid-feedback">Minimum 6 caractères.</div>
          </div>
          <div class="form-group col-md-4">
            <label for="">Confirmer</label>
            <input class="form-control" type="password" name="" value="" placeholder="*********" required>
            <div class="invalid-feedback">Veuillez confirmer votre mot de passe.</div>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Ecole</label>
            <select class="form-control" name="">
              <option value="">EPSI</option>
              <option value="">IDRAC</option>
              <option value="">WIZ</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="">Niveau d'étude</label>
            <select class="form-control" name="">
              <option value="">1ère année</option>
              <option value="">2ème année</option>
              <option value="">3ème année</option>
              <option value="">4ème année</option>
              <option value="">5ème année</option>
            </select>
          </div>
        </div>
      </div>
      <a href="connexion.php">Vous avez déjà un compte ?</a>
      <button class="btn btn-lg btn-primary btn-block" type="submit">S'inscrire</button>
      <p class="text-muted">&copy; 2019 - Nom du site</p>
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

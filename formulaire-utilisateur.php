<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire d'enregistrement d'utilisateur</title>
  <link rel="stylesheet" href="./css/formulaire.css">
  <link rel="stylesheet" href="/agregateur2/dist/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</head>
<body>
<?php
        echo file_get_contents("navbar.html");
    ?>
<div class="formbold-main-wrapper">
  <img src="images/logo3i.png" height="300px" width="300px">

  <div class="formbold-form-wrapper">
    <form action="insertion-utilisateur.php" method="POST" id="utilisateurForm">
      <div class="formbold-form-title">
        <h2 class="">Ajouter un nouvel utilisateur</h2>
        <p>
          Créer un nouvel utilisateur manuellement via ce formulaire.
        </p>
      </div>

      <div class="formbold-input-flex">
        <div>
          <label for="nom" class="formbold-form-label">
            Nom
          </label>
          <input type="text" name="nom" id="nom" class="formbold-form-input" />
        </div>
        <div>
          <label for="prenom" class="formbold-form-label"> Prénom </label>
          <input type="text" name="prenom" id="prenom" class="formbold-form-input" />
        </div>
      </div>

      <div class="formbold-input-flex">
        <div>
          <label for="email" class="formbold-form-label"> Email </label>
          <input type="email" name="email" id="email" class="formbold-form-input" />
        </div>
        <div>
          <label for="motdepasse" class="formbold-form-label"> Mot de passe </label>
          <input type="password" name="motdepasse" id="motdepasse" class="formbold-form-input" />
        </div>
      </div>

      <div class="formbold-input-group">
        <label class="formbold-form-label">
          Rôle
        </label>
        <select class="formbold-form-select" name="role" id="role">
          <option value="admin">Admin</option>
          <option value="user">User</option>
        </select>
      </div>

      <button class="formbold-btn">Créer l'utilisateur</button>
    </form>
  </div>
</div>

</body>
</html>

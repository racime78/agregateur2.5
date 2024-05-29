<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>formulaire d'enregistrement d'offre d'emploi</title>
  <link rel="stylesheet" href="./css/formulaire.css">
  <link rel="stylesheet" href="/agregateur2/dist/style.css" />

</head>
<body>

<div class="formbold-main-wrapper">
<img src="images/logo3i.png" height="300px" width="300px">

  <div class="formbold-form-wrapper">

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

    <form action="insertion-offre.php" method="POST" id="offreForm">
      <div class="formbold-form-title">
        <h2 class="">Ajouter une nouvelle offre</h2>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
          eiusmod tempor incididunt.
        </p>
      </div>

      <div class="formbold-input-flex">
        <div>
          <label for="entreprise" class="formbold-form-label">
            Entreprise
          </label>
          <input
            type="text"
            name="entreprise"
            id="entreprise"
            class="formbold-form-input"
          />
        </div>
        <div>
          <label for="logourl" class="formbold-form-label"> URL du logo de l'entreprise </label>
          <input
            type="text"
            name="logourl"
            id="logourl"
            class="formbold-form-input"
          />
        </div>
      </div>

      <div class="formbold-input-flex">
        <div>
          <label for="titre" class="formbold-form-label"> Titre de l'offre </label>
          <input
            type="text"
            name="titre"
            id="titre"
            class="formbold-form-input"
          />
        </div>
        <div>
          <label for="dateoffre" class="formbold-form-label"> Date de l'offre </label>
          <input
            type="date"
            name="dateoffre"
            id="dateoffre"
            class="formbold-form-input"
          />
        </div>
      </div>

      <div class="formbold-input-group">
        <label class="formbold-form-label">
          Type de contrat
        </label>

        <select class="formbold-form-select" name="contrat" id="contrat">
          <option value="CDI">CDI</option>
          <option value="CDD">CDD</option>
          <option value="Stage">Stage</option>
          <option value="Apprentissage">Apprentissage</option>
        </select>
      </div>

      <div class="formbold-mb-3">
        <label for="urloffre" class="formbold-form-label">
          Lien de l'offre
        </label>
        <input
          type="text"
          name="urloffre"
          id="urloffre"
          class="formbold-form-input"
        />
      </div>

      <div class="formbold-input-flex">
        <div>
          <label for="ville" class="formbold-form-label"> Ville </label>
          <input
            type="text"
            name="ville"
            id="ville"
            class="formbold-form-input"
          />
        </div>
        
      </div>

      <div class="formbold-checkbox-wrapper">
        <label for="supportCheckbox" class="formbold-checkbox-label">
          <div class="formbold-relative">
            <input
              type="checkbox"
              id="supportCheckbox"
              class="formbold-input-checkbox"
            />
            
          </div>
        </label>
      </div>
      <button class="formbold-btn">Créer l'offre</button>
    </form>
    <br>
    <?php
    require('insertion-offre.php');
    ?>
  </div>
</div>
</body>
</html>

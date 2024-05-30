<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>formulaire d'enregistrement d'offre d'emploi</title>
  <link rel="stylesheet" href="./css/formulaire.css">
  <link rel="stylesheet" href="/agregateur2/dist/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</head>
<body>
<div class="formbold-main-wrapper">
  <img src="images/logo3i.png" height="300px" width="300px">

  <div class="formbold-form-wrapper">
    <form action="insertion-offre.php" method="POST" id="offreForm">
      <div class="formbold-form-title">
        <h2 class="">Ajouter une nouvelle offre</h2>
        <p>
          Créer une nouvelle offre manuellement via ce formulaire.
        </p>
      </div>

      <div class="formbold-input-flex">
        <div>
          <label for="entreprise" class="formbold-form-label">
            Entreprise
          </label>
          <input type="text" name="entreprise" id="entreprise" class="formbold-form-input" />
        </div>
        <div>
          <label for="logourl" class="formbold-form-label"> URL du logo de l'entreprise </label>
          <input type="text" name="logourl" id="logourl" class="formbold-form-input" />
        </div>
      </div>

      <div class="formbold-input-flex">
        <div>
          <label for="titre" class="formbold-form-label"> Titre de l'offre </label>
          <input type="text" name="titre" id="titre" class="formbold-form-input" />
        </div>
        <div>
          <label for="dateoffre" class="formbold-form-label"> Date de l'offre </label>
          <input type="date" name="dateoffre" id="dateoffre" class="formbold-form-input" />
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
        <input type="text" name="urloffre" id="urloffre" class="formbold-form-input" />
      </div>

      <div class="formbold-input-flex">
        <div>
          <label for="ville" class="formbold-form-label"> Ville </label>
          <select name="ville" id="ville" class="formbold-form-select">
            <option value="">Sélectionner une ville</option>
          </select>
        </div>
      </div>

      <div class="formbold-checkbox-wrapper">
        <label for="supportCheckbox" class="formbold-checkbox-label">
          <div class="formbold-relative">
            <input type="checkbox" id="supportCheckbox" class="formbold-input-checkbox" />
          </div>
        </label>
      </div>
      <button class="formbold-btn">Créer l'offre</button>
    </form>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#ville').select2({
      placeholder: 'Sélectionner une ville',
      minimumInputLength: 3,
      ajax: {
        url: 'search_villes.php',
        dataType: 'json',
        delay: 250,
        data: function(params) {
          return {
            q: params.term // search term
          };
        },
        processResults: function(data) {
          return {
            results: data
          };
        },
        cache: true
      }
    });
  });
</script>
</body>
</html>

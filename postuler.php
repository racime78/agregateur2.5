<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des offres d'emploi</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
  <link rel="stylesheet" href="/agregateur2/dist/style.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  <style>
    .offer-card { cursor: pointer; }
    .sidebar form div {
      margin-bottom: 16px;
    }
    .fixed-size {
      min-height: 500px; /* Ajustez cette valeur selon vos besoins */
    }
    .sidebar select, .sidebar input, .sidebar button {
      width: 100%;
      padding: 12px; /* Ajustez le padding pour une meilleure lisibilité */
    }
    .checkbox-group {
      display: flex;
      justify-content: space-between;
    }
    .checkbox-group div {
      flex: 1;
    }
  </style>
</head>
<body class="bg-gray-100">
  <div class="navbar-fixed">
    <?php include('navbar.html'); ?>
  </div>

  <div class="content mx-auto flex mt-24 space-x-6 h-screen">
    <div class="sidebar bg-blue-500 text-white p-6 rounded-lg w-1/3 h-full fixed-size text-left overflow-auto">
      <h3 class="text-lg font-semibold mb-4 text-white">Localisation</h3>
      <form class="flex-col" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return checkFilters();">
        <div>
          <label for="ville" class="font-semibold mb-4 text-white">Ville:</label>
          <select id="ville" name="ville" class="w-full p-2 rounded border border-gray-300 text-black">
            <option value="">Sélectionner une ville</option>
          </select>
        </div>
        <div>
          <label for="region" class="font-semibold mb-4 text-white">Région:</label>
          <select id="region" name="region" class="w-full p-2 rounded border border-gray-300 text-black">
            <option value="">Sélectionner une région</option>
          </select>
        </div>
        <h3 class="text-lg font-semibold mb-4 text-white">Offre</h3>
        <div>
          <label for="type_contrat" class="font-semibold mb-4 text-white">Type de contrat:</label>
          <select id="type_contrat" name="type_contrat" class="w-full p-2 rounded border border-gray-300 text-black">
            <option value="">Type de contrat</option>
            <option value="CDI">CDI</option>
            <option value="CDD">CDD</option>
            <option value="Alternance">Alternance</option>
            <option value="Stage">Stage</option>
          </select>
        </div>
        <div class="mb-4">
          <label class="font-semibold mb-2 block text-white">Période:</label>
          <div class="checkbox-group">
            <div>
              <input type="checkbox" id="24h" name="periode[]" value="24h" onclick="onlyOne(this)">
              <label for="24h" class="text-white">24h</label>
            </div>
            <div>
              <input type="checkbox" id="1semaine" name="periode[]" value="1semaine" onclick="onlyOne(this)">
              <label for="1semaine" class="text-white">1 semaine</label>
            </div>
            <div>
              <input type="checkbox" id="1mois" name="periode[]" value="1mois" onclick="onlyOne(this)">
              <label for="1mois" class="text-white">1 mois</label>
            </div>
          </div>
        </div>
        <div>
          <button type="submit" class="btn-blue-border bg-white font-bold px-4 rounded w-full">Rechercher</button>
        </div>
      </form>
    </div>

    <div class="main-content-scrollable w-1/3 h-full fixed-size overflow-auto">
      <?php
        require('config.php');

        // Récupérer les filtres de la requête GET
        $ville = isset($_GET['ville']) ? $_GET['ville'] : '';
        $region = isset($_GET['region']) ? $_GET['region'] : '';
        $type_contrat = isset($_GET['type_contrat']) ? $_GET['type_contrat'] : '';
        $periodes = isset($_GET['periode']) ? $_GET['periode'] : [];

        // Construire la requête SQL avec les filtres
        $sql = "
          SELECT offre.*, ville.NomV 
          FROM offre 
          JOIN ville ON offre.ID_Ville = ville.ID_VilleRegion
          WHERE 1=1
        ";

        if (!empty($ville)) {
          $sql .= " AND ville.ID_VilleRegion = '" . $conn->real_escape_string($ville) . "'";
        }

        if (!empty($region)) {
          $sql .= " AND ville.Region LIKE '%" . $conn->real_escape_string($region) . "%'";
        }

        if (!empty($type_contrat)) {
          $sql .= " AND offre.Contrat = '" . $conn->real_escape_string($type_contrat) . "'";
        }

        if (!empty($periodes)) {
          $date_filter = [];
          $current_date = date('Y-m-d H:i:s');
          if (in_array('24h', $periodes)) {
            $date_filter[] = "offre.Date_Offre >= DATE_SUB('$current_date', INTERVAL 1 DAY)";
          }
          if (in_array('1semaine', $periodes)) {
            $date_filter[] = "offre.Date_Offre >= DATE_SUB('$current_date', INTERVAL 1 WEEK)";
          }
          if (in_array('1mois', $periodes)) {
            $date_filter[] = "offre.Date_Offre >= DATE_SUB('$current_date', INTERVAL 1 MONTH)";
          }
          if (!empty($date_filter)) {
            $sql .= " AND (" . implode(' OR ', $date_filter) . ")";
          }
        }

        $result = $conn->query($sql);

        // Afficher les offres d'emploi
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<div class='offer-card border border-gray-200 rounded-lg p-4 mb-4' data-titre='" . $row["Titre"] . "' data-description='" . $row["Description_offre"] . "'>";
            echo "<h3 class='text-xl font-semibold mb-2'>" . $row["Titre"] . "</h3>";
            echo "<p class='text-gray-600 mb-2'>" . $row["Entreprise"] . ", " . $row["NomV"] . "</p>";
            echo "<p class='text-gray-600 mb-4'>" . $row["Contrat"] . "</p>";
            echo "<p class='text-gray-600 mb-4'>" . $row["Date_Offre"] . "</p>";
            echo "<a href='" . $row["Lien"] . "' class='btn-blue-border font-bold py-2 px-4 rounded'>Voir l'offre</a>";
            echo "</div>";
          }
        } else {
          echo "<p>Aucune offre d'emploi trouvée.</p>";
        }

        $conn->close();
      ?>
    </div>

    <div class="main-content ml-6 w-1/3 h-full fixed-size overflow-auto">
      <h2 id="offer-title" class="text-2xl font-semibold mb-4">Titre de l'offre</h2>
      <p class="text-gray-700 mb-4">Description de l'offre</p>
      <p id="offer-description" class="text-gray-700">Texte de la description</p>
    </div>
  </div>

  <?php include('footer.html'); ?>

  <script>
    function onlyOne(checkbox) {
      const checkboxes = document.querySelectorAll('input[name="periode[]"]');
      checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false;
      });
    }

    function checkFilters() {
      const ville = document.getElementById('ville').value;
      const region = document.getElementById('region').value;
      const type_contrat = document.getElementById('type_contrat').value;
      const periodes = document.querySelectorAll('input[name="periode[]"]:checked');
      
      if (ville === "" && region === "" && type_contrat === "" && periodes.length === 0) {
        window.location.href = "http://localhost/agregateur2/postuler.php";
        return false;
      }
      return true;
    }

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
              q: params.term
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

      $('#region').select2({
        placeholder: 'Sélectionner une région',
        minimumInputLength: 3,
        ajax: {
          url: 'search_regions.php',
          dataType: 'json',
          delay: 250,
          data: function(params) {
            return {
              q: params.term
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

    document.addEventListener('DOMContentLoaded', function () {
      const offerCards = document.querySelectorAll('.offer-card');
      offerCards.forEach(card => {
        card.addEventListener('click', function () {
          const titre = this.getAttribute('data-titre');
          const description = this.getAttribute('data-description');

          document.getElementById('offer-title').textContent = titre;
          document.getElementById('offer-description').textContent = description;
        });
      });
    });
  </script>
</body>
</html>

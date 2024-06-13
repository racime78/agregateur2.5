<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des offres d'emploi</title>
  <link rel="stylesheet" href="dist/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
  <style>
    .offer-card { cursor: pointer; }
  </style>
</head>
<body class="bg-gray-100">
  <div class="navbar-fixed">
    <?php include('navbar.html'); ?>
  </div>

  <div class="content mx-auto flex mt-24">
    <div class="sidebar bg-gray-800 text-white p-6 rounded-lg mr-6 w-64">
      <h3 class="text-lg font-semibold mb-4 text-black">Localisation</h3>
      <input type="text" placeholder="Ville" class="w-full p-2 mb-4 rounded border border-gray-300 text-black placeholder-gray-500">
      <input type="text" placeholder="Région" class="w-full p-2 mb-4 rounded border border-gray-300 text-black placeholder-gray-500">
      <h3 class="text-lg font-semibold mb-4 text-black">Offre</h3>
      <select class="w-full p-2 mb-4 rounded border border-gray-300 text-black">
        <option>Type de contrat</option>
      </select>
      <select class="w-full p-2 mb-4 rounded border border-gray-300 text-black">
        <option>Domaine</option>
      </select>
      <select class="w-full p-2 mb-4 rounded border border-gray-300 text-black">
        <option>Trier par</option>
      </select>
    </div>

    <div class="main-content-scrollable w-1/2">
      <?php
        require('config.php');

        // Requête pour récupérer les offres d'emploi avec les noms des villes
        $sql = "
          SELECT offre.*, ville.NomV 
          FROM offre 
          JOIN ville ON offre.ID_Ville = ville.ID_VilleRegion
        ";
        $result = $conn->query($sql);

        // Afficher les offres d'emploi dans le tableau
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<div class='offer-card border border-gray-200 rounded-lg p-4 mb-4' data-titre='" . $row["Titre"] . "' data-description='" . $row["Description_offre"] . "'>";
            echo "<h3 class='text-xl font-semibold mb-2'>" . $row["Titre"] . "</h3>";
            echo "<p class='text-gray-600 mb-2'>" . $row["Entreprise"] . ", " . $row["NomV"] . "</p>";
            echo "<p class='text-gray-600 mb-4'>" . $row["Contrat"] . "</p>";
            echo "<p class='text-gray-600 mb-4'>" . $row["Date_Offre"] . "</p>";
            echo "<a href='" . $row["Lien"] . "' class='bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600'>Voir l'offre</a>";
            echo "</div>";
          }
        } else {
          echo "<p>Aucune offre d'emploi trouvée.</p>";
        }

        $conn->close();
      ?>
    </div>

    <div class="main-content ml-6 w-1/2">
      <h2 id="offer-title" class="text-2xl font-semibold mb-4">Titre de l'offre</h2>
      <p class="text-gray-700 mb-4">Description de l'offre</p>
      <p id="offer-description" class="text-gray-700">Texte de la description</p>
    </div>
  </div>

  <?php include('footer.html'); ?>

  <script>
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

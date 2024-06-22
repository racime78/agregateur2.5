<?php
require('config.php');

$sql = "SELECT o.ID_O, o.Entreprise, o.Titre, o.Date_Offre, o.Contrat, v.NomV 
        FROM offre o 
        JOIN ville v ON o.ID_Ville = v.ID_VilleRegion";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des offres d'emploi</title>
  <link rel="stylesheet" href="/agregateur2/dist/style.css" />
  <style>
    body {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }
    .container {
      width: 100%;
      max-width: 1200px;
    }
    .actions a {
      margin-right: 8px;
    }
  </style>
</head>
<body class="bg-gray-100">

<div class="container">
  <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">Gestion des offres d'emploi</h2>
  <a href="formulaire-offres.php"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">Ajouter une offre</button></a>

  <div class="overflow-x-auto">
    <table class="min-w-full border border-gray-200 mx-auto">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-4 py-2">ID</th>
          <th class="px-4 py-2">Entreprise</th>
          <th class="px-4 py-2">Titre</th>
          <th class="px-4 py-2">Date de l'offre</th>
          <th class="px-4 py-2">Contrat</th>
          <th class="px-4 py-2">Ville</th>
          <th class="px-4 py-2">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
          // Display job offers in the table
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td class='border px-4 py-2'>" . $row["ID_O"] . "</td>";
              echo "<td class='border px-4 py-2'>" . $row["Entreprise"] . "</td>";
              echo "<td class='border px-4 py-2'>" . $row["Titre"] . "</td>";
              echo "<td class='border px-4 py-2'>" . $row["Date_Offre"] . "</td>";
              echo "<td class='border px-4 py-2'>" . $row["Contrat"] . "</td>";
              echo "<td class='border px-4 py-2'>" . $row["NomV"] . "</td>";
              echo "<td class='border px-4 py-2 flex actions'>";
              echo "<a href='voir-offre.php?id=" . $row["ID_O"] . "' class='text-blue-500 hover:underline mr-2'>Voir</a>";
              echo "<a href='modifier-offre.php?id=" . $row["ID_O"] . "' class='text-yellow-500 hover:underline mr-2'>Modifier</a>";
              echo "<a href='supprimer-offre.php?id=" . $row["ID_O"] . "' class='text-red-500 hover:underline'>Supprimer</a>";
              echo "</td>";
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='7' class='border px-4 py-2 text-center' colspan='7'>Aucune offre d'emploi trouvée.</td></tr>";
          }
          $conn->close();
        ?>
      </tbody>
    </table>
  </div>
</div>

<script>
  function voirOffre(id) {
    window.open('voir-offre.php?id=' + id, 'Voir Offre', 'width=600,height=400');
  }

  function modifierOffre(id) {
    window.open('modifier-offre.php?id=' + id, 'Modifier Offre', 'width=600,height=400');
  }

  function supprimerOffre(id) {
    if (confirm("Êtes-vous sûr de vouloir supprimer cette offre ?")) {
      window.open('supprimer-offre.php?id=' + id, 'Supprimer Offre', 'width=400,height=200');
    }
  }
</script>

</body>
</html>

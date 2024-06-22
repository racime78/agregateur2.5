<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des utilisateurs</title>
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
  <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">Gestion des utilisateurs</h2>
  <a href="formulaire-utilisateur.php"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">Ajouter un utilisateur</button></a>

  <div class="overflow-x-auto">
    <table class="min-w-full border border-gray-200 mx-auto">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-4 py-2">ID</th>
          <th class="px-4 py-2">Nom</th>
          <th class="px-4 py-2">Prénom</th>
          <th class="px-4 py-2">Email</th>
          <th class="px-4 py-2">Rôle</th>
          <th class="px-4 py-2">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
          require('config.php');

          $sql = "SELECT * FROM utilisateur";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td class='border px-4 py-2'>" . $row["ID_U"] . "</td>";
              echo "<td class='border px-4 py-2'>" . $row["Nom_U"] . "</td>";
              echo "<td class='border px-4 py-2'>" . $row["Prenom_U"] . "</td>";
              echo "<td class='border px-4 py-2'>" . $row["Mail_U"] . "</td>";
              echo "<td class='border px-4 py-2'>" . $row["Role_U"] . "</td>";
              echo "<td class='border px-4 py-2 flex actions'>";
              echo "<a href='voir-utilisateur.php?id=" . $row["ID_U"] . "' class='text-blue-500 hover:underline mr-2'>Voir</a>";
              echo "<a href='modifier-utilisateur.php?id=" . $row["ID_U"] . "' class='text-yellow-500 hover:underline mr-2'>Modifier</a>";
              echo "<a href='supprimer-utilisateur.php?id=" . $row["ID_U"] . "' class='text-red-500 hover:underline'>Supprimer</a>";
              echo "</td>";
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='6' class='border px-4 py-2 text-center'>Aucun utilisateur trouvé.</td></tr>";
          }
          $conn->close();
        ?>
      </tbody>
    </table>
  </div>
</div>

<script>
  // Fonction pour ouvrir un pop-up pour voir l'utilisateur
  function voirUtilisateur(id) {
    window.open('voir-utilisateur.php?id=' + id, 'Voir Utilisateur', 'width=600,height=400');
  }

  // Fonction pour ouvrir un pop-up pour modifier l'utilisateur
  function modifierUtilisateur(id) {
    window.open('modifier-utilisateur.php?id=' + id, 'Modifier Utilisateur', 'width=600,height=400');
  }

  // Fonction pour ouvrir un pop-up pour supprimer l'utilisateur
  function supprimerUtilisateur(id) {
    if (confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur ?")) {
      window.open('supprimer-utilisateur.php?id=' + id, 'Supprimer Utilisateur', 'width=400,height=200');
    }
  }
</script>

</body>
</html>

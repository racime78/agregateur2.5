<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'utilisateur</title>
    <link rel="stylesheet" href="/agregateur2/dist/style.css" />
</head>
<body class="bg-gray-100">
    <div class="max-w-2xl mx-auto py-8 px-4">
        <?php
        require('config.php');

        if(isset($_GET['id']) && !empty($_GET['id'])) {
            $utilisateur_id = $_GET['id'];

            // Récupérer les détails de l'utilisateur
            $sql = "SELECT * FROM utilisateur WHERE ID_U = $utilisateur_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
        ?>
                <h2 class="text-2xl font-bold mb-4">Détails de l'utilisateur</h2>
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Utilisateur ID: <?php echo $row['ID_U']; ?></h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">Nom: <?php echo $row['Nom_U']; ?></p>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">Prénom: <?php echo $row['Prenom_U']; ?></p>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">Email: <?php echo $row['Mail_U']; ?></p>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">Rôle: <?php echo $row['Role_U']; ?></p>
                    </div>
                </div>
        <?php
            } else {
                echo "<p class='text-red-500'>Aucun utilisateur trouvé.</p>";
            }

            $conn->close();
        } else {
            echo "<p class='text-red-500'>ID de l'utilisateur non fourni.</p>";
        }
        ?>
    </div>
</body>
</html>

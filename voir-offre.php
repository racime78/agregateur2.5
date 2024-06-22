<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'offre d'emploi</title>
    <link rel="stylesheet" href="/agregateur2/dist/style.css" />
</head>
<body class="bg-gray-100">
    <div class="max-w-2xl mx-auto py-8 px-4">
        <?php
        require('config.php');

        if(isset($_GET['id']) && !empty($_GET['id'])) {
            $offre_id = $_GET['id'];

            // Récupérer les détails de l'offre d'emploi avec le nom de la ville
            $sql = "SELECT o.*, v.NomV 
                    FROM offre o 
                    JOIN ville v ON o.ID_Ville = v.ID_VilleRegion 
                    WHERE o.ID_O = $offre_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
        ?>
                <h2 class="text-2xl font-bold mb-4">Détails de l'offre d'emploi</h2>
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Offre ID: <?php echo $row['ID_O']; ?></h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">Entreprise: <?php echo $row['Entreprise']; ?></p>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">Titre: <?php echo $row['Titre']; ?></p>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">Date de l'offre: <?php echo $row['Date_Offre']; ?></p>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">Contrat: <?php echo $row['Contrat']; ?></p>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">Ville: <?php echo $row['NomV']; ?></p>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">Description: </br> <?php echo nl2br($row['Description_offre']); ?></p>
                    </div>
                </div>
        <?php
            } else {
                echo "<p class='text-red-500'>Aucune offre d'emploi trouvée.</p>";
            }

            $conn->close();
        } else {
            echo "<p class='text-red-500'>ID de l'offre d'emploi non fourni.</p>";
        }
        ?>
    </div>
</body>
</html>

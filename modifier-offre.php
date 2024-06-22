<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'offre d'emploi</title>
    <link rel="stylesheet" href="/agregateur2/dist/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</head>
<body>

<?php
require('config.php');

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $offre_id = $_GET['id'];
    
    // Récupérer les détails de l'offre d'emploi
    $sql = "SELECT * FROM offre WHERE ID_O = $offre_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $current_ville_id = $row['ID_Ville'];
?>
        <div class="max-w-md mx-auto">
            <h2 class="text-2xl font-bold mb-4">Modifier l'offre d'emploi</h2>
            <form action="modifier-offre-processus.php" method="POST" class="space-y-4">
                <input type="hidden" name="offre_id" value="<?php echo $row['ID_O']; ?>">
                
                <div>
                    <label for="entreprise" class="block mb-1">Entreprise:</label>
                    <input type="text" id="entreprise" name="entreprise" value="<?php echo $row['Entreprise']; ?>" class="w-full border border-gray-300 rounded px-3 py-2">
                </div>
                
                <div>
                    <label for="titre" class="block mb-1">Titre:</label>
                    <input type="text" id="titre" name="titre" value="<?php echo $row['Titre']; ?>" class="w-full border border-gray-300 rounded px-3 py-2">
                </div>
                
                <div>
                    <label for="contrat" class="block mb-1">Type de contrat:</label>
                    <select id="contrat" name="contrat" class="w-full border border-gray-300 rounded px-3 py-2">
                        <option value="CDI" <?php if($row['Contrat'] == 'CDI') echo 'selected'; ?>>CDI</option>
                        <option value="CDD" <?php if($row['Contrat'] == 'CDD') echo 'selected'; ?>>CDD</option>
                        <option value="Stage" <?php if($row['Contrat'] == 'Stage') echo 'selected'; ?>>Stage</option>
                        <option value="Apprentissage" <?php if($row['Contrat'] == 'Apprentissage') echo 'selected'; ?>>Apprentissage</option>
                    </select>
                </div>
                
                <div>
                    <label for="ville" class="block mb-1">Ville:</label>
                    <select name="ville" id="ville" class="w-full border border-gray-300 rounded px-3 py-2">
                        <option value="">Sélectionner une ville</option>
                    </select>
                </div>

                <div>
                    <label for="description" class="block mb-1">Description (1000 caractères):</label>
                    <input type="text" id="description" name="description" value="<?php echo $row['Description_offre']; ?>" class="w-full border border-gray-300 rounded px-3 py-2">
                </div>
                
                <div>
                    <input type="submit" value="Enregistrer" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                </div>
            </form>
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

            // Pre-select the current city
            $.ajax({
                url: 'search_ville_by_id.php',
                type: 'GET',
                data: { id: <?php echo $current_ville_id; ?> },
                success: function(data) {
                    var city = JSON.parse(data);
                    var option = new Option(city.text, city.id, true, true);
                    $('#ville').append(option).trigger('change');
                }
            });
          });
        </script>

<?php
    } else {
        echo "Aucune offre d'emploi trouvée.";
    }
    
    $conn->close();
} else {
    echo "ID de l'offre d'emploi non fourni.";
}
?>

</body>
</html>

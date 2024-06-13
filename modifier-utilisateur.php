<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'utilisateur</title>
    <link rel="stylesheet" href="/agregateur2/dist/style.css" />
</head>
<body>

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
        <div class="max-w-md mx-auto">
            <h2 class="text-2xl font-bold mb-4">Modifier l'utilisateur</h2>
            <form action="modifier-utilisateur-processus.php" method="POST" class="space-y-4">
                <input type="hidden" name="utilisateur_id" value="<?php echo $row['ID_U']; ?>">
                
                <div>
                    <label for="nom" class="block mb-1">Nom:</label>
                    <input type="text" id="nom" name="nom" value="<?php echo $row['Nom_U']; ?>" class="w-full border border-gray-300 rounded px-3 py-2">
                </div>
                
                <div>
                    <label for="prenom" class="block mb-1">Prénom:</label>
                    <input type="text" id="prenom" name="prenom" value="<?php echo $row['Prenom_U']; ?>" class="w-full border border-gray-300 rounded px-3 py-2">
                </div>
                
                <div>
                    <label for="email" class="block mb-1">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $row['Mail_U']; ?>" class="w-full border border-gray-300 rounded px-3 py-2">
                </div>
                
                <div>
                    <label for="role" class="block mb-1">Rôle:</label>
                    <select id="role" name="role" class="w-full border border-gray-300 rounded px-3 py-2">
                        <option value="admin" <?php if($row['Role_U'] == 'admin') echo 'selected'; ?>>Admin</option>
                        <option value="user" <?php if($row['Role_U'] == 'user') echo 'selected'; ?>>User</option>
                    </select>
                </div>

                <div>
                    <input type="submit" value="Enregistrer" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                </div>
            </form>
        </div>

<?php
    } else {
        echo "Aucun utilisateur trouvé.";
    }
    
    $conn->close();
} else {
    echo "ID de l'utilisateur non fourni.";
}
?>

</body>
</html>

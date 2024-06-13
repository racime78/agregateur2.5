<?php
require('config.php');

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $utilisateur_id = $_GET['id'];
    
    // Supprimer l'utilisateur de la base de données
    $sql = "DELETE FROM utilisateur WHERE ID_U = $utilisateur_id";
    if ($conn->query($sql) === TRUE) {
        echo "L'utilisateur a été supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression de l'utilisateur: " . $conn->error;
    }
    
    $conn->close();
} else {
    echo "ID de l'utilisateur non fourni.";
}
?>

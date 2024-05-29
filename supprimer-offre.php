<?php
require('config.php');

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $offre_id = $_GET['id'];
    
    // Supprimer l'offre d'emploi de la base de données
    $sql = "DELETE FROM offre WHERE ID_O = $offre_id";
    if ($conn->query($sql) === TRUE) {
        echo "L'offre d'emploi a été supprimée avec succès.";
    } else {
        echo "Erreur lors de la suppression de l'offre d'emploi: " . $conn->error;
    }
    
    $conn->close();
} else {
    echo "ID de l'offre d'emploi non fourni.";
}
?>

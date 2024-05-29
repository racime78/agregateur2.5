<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si l'ID de l'offre est défini dans les données POST
    if (isset($_POST['offre_id'])) {
        // Récupérer l'ID de l'offre
        $offre_id = $_POST['offre_id'];
        
        // Récupérer les autres données du formulaire
        $entreprise = $_POST['entreprise'];
        $titre = $_POST['titre'];
        $contrat = $_POST['contrat'];
        $ville = $_POST['ville'];
        $description = $_POST['description'];
                
        // Traiter les données dans la base de données
        require('config.php');
        
        // Préparer la requête de mise à jour
        $sql = "UPDATE offre SET Entreprise = '$entreprise', Titre = '$titre', Contrat = '$contrat', ID_Ville = '$ville', Description_offre = '$description' WHERE ID_O = $offre_id";
        
        // Exécuter la requête de mise à jour
        if ($conn->query($sql) === TRUE) {
            // Redirection vers une page de confirmation ou une autre page
            header("Location: gestion-offre.php");
            exit(); // Assurez-vous d'arrêter l'exécution du script après la redirection
        } else {
            echo "Erreur lors de la mise à jour de l'offre: " . $conn->error;
        }
        
        // Fermer la connexion à la base de données
        $conn->close();
    } else {
        // Si l'ID de l'offre n'est pas défini dans les données POST
        echo "ID de l'offre non trouvé dans les données POST.";
    }
} else {
    // Si la méthode de requête n'est pas POST
    echo "Ce script ne peut être accédé que via une méthode POST.";
}
?>

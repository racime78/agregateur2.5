<?php

// Appel du fichier de connexion à la base de données
require('config.php');
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si tous les champs du formulaire ont été remplis
    if (isset($_POST['entreprise']) && isset($_POST['logourl']) && isset($_POST['titre']) && isset($_POST['dateoffre']) && isset($_POST['contrat']) && isset($_POST['urloffre']) && isset($_POST['ville'])) {
        
        // Récupérer les données du formulaire
        $entreprise = $_POST['entreprise'];
        $logourl = $_POST['logourl'];
        $titre = $_POST['titre'];
        $dateoffre = $_POST['dateoffre'];
        $contrat = $_POST['contrat'];
        $urloffre = $_POST['urloffre'];
        $ville = $_POST['ville'];
        
        // Préparer la requête d'insertion
        $sql = "INSERT INTO offre (Entreprise, LogoUrl, Titre, Date_Offre, Contrat, Lien, Ville) VALUES ('$entreprise', '$logourl', '$titre', '$dateoffre', '$contrat', '$urloffre', '$ville')";
        
        // Exécuter la requête d'insertion
        if ($conn->query($sql) === TRUE) {
            echo "Nouvelle offre ajoutée avec succès !";
        } else {
            echo "Erreur: " . $sql . "<br>" . $conn->error;
        }
        
        // Fermer la connexion
        $conn->close();
    } else {
        echo "Tous les champs du formulaire doivent être remplis.";
    }
}
?>

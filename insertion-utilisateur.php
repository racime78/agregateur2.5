<?php

// Appel du fichier de connexion à la base de données
require('config.php');

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si tous les champs du formulaire ont été remplis
    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['motdepasse']) && isset($_POST['role'])) {
        
        // Récupérer les données du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $motdepasse = $_POST['motdepasse'];
        $role = $_POST['role'];
        
        // Préparer la requête d'insertion
        $sql = "INSERT INTO utilisateur (Nom_U, Prenom_U, Mail_U, MDP_U, Role_U) VALUES ('$nom', '$prenom', '$email', '$motdepasse', '$role')";
        
        // Exécuter la requête d'insertion
        if ($conn->query($sql) === TRUE) {
            echo "Nouvel utilisateur ajouté avec succès !";
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

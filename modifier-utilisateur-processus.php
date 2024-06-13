<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si l'ID de l'utilisateur est défini dans les données POST
    if (isset($_POST['utilisateur_id'])) {
        // Récupérer l'ID de l'utilisateur
        $utilisateur_id = $_POST['utilisateur_id'];
        
        // Récupérer les autres données du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $role = $_POST['role'];
                
        // Traiter les données dans la base de données
        require('config.php');
        
        // Préparer la requête de mise à jour
        $sql = "UPDATE utilisateur SET Nom_U = '$nom', Prenom_U = '$prenom', Mail_U = '$email', Role_U = '$role' WHERE ID_U = $utilisateur_id";
        
        // Exécuter la requête de mise à jour
        if ($conn->query($sql) === TRUE) {
            // Redirection vers une page de confirmation ou une autre page
            header("Location: gestion_utilisateur.php");
            exit(); // Assurez-vous d'arrêter l'exécution du script après la redirection
        } else {
            echo "Erreur lors de la mise à jour de l'utilisateur: " . $conn->error;
        }
        
        // Fermer la connexion à la base de données
        $conn->close();
    } else {
        // Si l'ID de l'utilisateur n'est pas défini dans les données POST
        echo "ID de l'utilisateur non trouvé dans les données POST.";
    }
} else {
    // Si la méthode de requête n'est pas POST
    echo "Ce script ne peut être accédé que via une méthode POST.";
}
?>

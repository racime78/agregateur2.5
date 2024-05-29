<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregateur 2</title>
    <link rel="stylesheet" href="/agregateur2/dist/style.css" />

</head>
<body>
    <?php
        echo file_get_contents("navbar.html");
    ?>
        <script src="./script.js"></script>

    <section  class="text-center img-backg  content-center" >
        <h2 class="text-4xl font-extrabold dark:text-white mb-4 text-white">Rapide, Clair et Intuitif</h2>
        <h1 class="text-5xl font-extrabold dark:text-white mb-8 text-white">Postuler Rapidement ! </h1>
        <p class="mb-4 text-white font-bold">3i School vous accompagne dans votre recherche d’emploi.</br> Nous vous centralisons un grand nombre d’offres d’emploi lié à l’IT sur notre plateforme.</p>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Postuler à des offres</button>
    </section>

    <section class="bg-blue-500 height70 pt-8">
        <div class="text-center  mb-8">
            <h2 class="text-white  font-bold text-4xl pt-10 ">Inscrivez vous !</h2>
            <p class="text-white mt-10 font-semibold">Pour une expérience de navigation personnalisé n'hésitez pas à vous inscrire sur notre plateforme !</p>
            </div>

            <div class="flex justify-center">
                <div class="text-center">
                    <p class="mb-4 text-white font-semibold">Vous êtes un candidat ?<br>Inscrivez-vous pour accéder à des offres personnalisées</p>
                    <button class="image-button"><img src="images/icone_candidat.png" alt="Bouton lien Candidat" width="200px" height="200px"></button>
                </div>
        </div>
    </section>

    <section class="height70 pt-8">
        <h3 class="text-blue-500 text-4xl font-extrabold text-center">3i School c'est quoi ?</h3>
        <?php
            echo file_get_contents("slider.html");
        ?>        
        <h3 class="text-blue-500 text-4xl font-extrabold text-center">Que pense nos utilisateurs ?</h3>
        <?php
            echo file_get_contents("testimonial.html");
            echo file_get_contents("footer.html");
        ?>

    </section>  
</body>
</html>
<?php 
session_start();
class ViewQuizz{
    public function render(){
        ob_start();
?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <link rel="stylesheet" href="../src/styles/quizz.css">
            <title>Acceuil</title>
        </head>
        <body>
            <header class="sticky-top">
                <div>
                    <img src="../src/images/home.PNG" alt="image" class="interaction" id="home">
                    <img src="../src/images/logo.png" alt="image">
                    <div id="profilAcces">
                        <img src="../src/images/phoque.jpg" alt="img" class="interaction" id="profil">
                        <a href="deconnexion.php" class="interaction">Se déconnecter</a>
                    </div>
                </div>
                <nav>
                    <a href="./accueil.php">Acceuil /</a><a href="./quizz.php">Quizz</a>
                </nav>
            </header>
            <main>
                <h1>Quiz Multijoueur</h1>
                <div id="quiz-container">
                    <div id="questions"></div>
                    <div id="scores">Score: 0</div>
                    <div id="time"></div>
                </div>
            </main>
            <footer>
                <div>
                <img src="../src/images/linkedin (1).png" alt="image" class="footerImg interaction" id="linkedin">
                <img src="../src/images/facebook.png" alt="image" class="footerImg interaction" id="facebook">
                </div>
                <img src="../src/images/adrar.png" alt="image" class="footerImg interaction" id="adrar">
                <div>
                <a href="#" class="interaction">à propos</a>
                <a href="#" class="interaction">plan du site</a>
                </div>
            </footer>
        </body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script>
            document.getElementById("adrar").addEventListener('click', function() {
                window.open("https://www.adrar-formation.com/");
            });

            document.getElementById("facebook").addEventListener('click', function() {
                window.open("https://www.facebook.com/ADRARformation/");
            });

            document.getElementById("linkedin").addEventListener('click', function() {
                window.open("https://www.linkedin.com/company/adrar-formation");
            });

            document.getElementById("home").addEventListener('click', function() {
                window.location.href = "./accueil.php";
            });

            document.getElementById("profil").addEventListener('click', function() {
                window.location.href = "./profil.php";
            });
        </script>
        <script src="../src/script/quiz.js"></script>
        </body>
        </html>
<?php
        return ob_get_clean();
    }
}
?>
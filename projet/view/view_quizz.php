<?php 
session_start();
class ViewQuizz{
    // à modifier un fois que l'on codera le quizz en lui-même. pour l'instant affiche seulement le pseudo
    private ?string $pseudo;

    public function __construct(){
        $this->pseudo = "";
    }

    public function getPseudo(): ?string{
        return $this->pseudo;
    }
    public function setPseudo(?string $pseudo): ViewQuizz{
        $this->pseudo = $pseudo;
        return $this;
    }

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
            <link rel="stylesheet" href="./style.css">
            <title>Acceuil</title>
        </head>
        <body>
            <header class="sticky-top">
                <div>
                    <img src="./design/home.PNG" alt="image" class="interaction" id="home">
                    <img src="./design/logo.png" alt="image">
                    <div id="profilAcces">
                        <img src="./design/phoque.jpg" alt="img" class="interaction" id="profil">
                        <a href="deconnexion.php" class="interaction">Se déconnecter</a>
                    </div>
                </div>
                <nav>
                    <a href="./index.php">Acceuil</a>
                </nav>
            </header>
            <main>
                    <p> <?php echo $this->getPseudo() ?> </p> </br>

    <!--espace dédié au quizz en lui-même-->

    <!--fin espace dédié au quizz-->

            </main>
            <footer>
                <div>
                <img src="./design/linkedin (1).png" alt="image" class="footerImg interaction" id="linkedin">
                <img src="./design/facebook.png" alt="image" class="footerImg interaction" id="facebook">
                </div>
                <img src="./design/adrar.png" alt="image" class="footerImg interaction" id="adrar">
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
                window.location.href = "./index.html";
            });

            document.getElementById("profil").addEventListener('click', function() {
                window.location.href = "./profil.html";
            });
        </script>

        </body>
        </html>
<?php
        return ob_get_clean();
    }
}
?>
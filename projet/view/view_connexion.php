<?php
session_start();
class ViewIndex{
    private ?string $message;

    public function __construct(){
        $this->message = "";
    }

    public function getMessage(): string|null{
        return $this->message;
    }
    public function setMessage(?string $newmessage): viewIndex{
        $this->message = $newmessage;
        return $this;
    }

    public function render(): string{

        ob_start();
?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="./src/styles/connexion.css">
        <title>Connexion</title>
    </head>
    <body>
        
        <header class="sticky-top">
            <div>
                <img src="./src/images/logo.png" alt="image">
            </div>
            <nav>
                <a href="./index.php">Connexion</a>
            </nav>
        </header>
        <main>
            <form action="" id="connexion" method="post">
                <h3>Connexion</h3>
                <label for="email">Email</label>
                <input type="text" id="emailconnexion" name="email" required>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="passwordconnexion" required>
                <button type="submit" id="bouton1" name ="submitConnexion" class="interaction">Connexion</button>
            </form>
        
            <form action="" id="formulaire" method="post">
                <h3>Inscription</h3>
                <label for="pseudoInscription">Votre pseudo</label>
                <input type="text" name="pseudoInscription" id="firstname">
                <label for="emailInscription">Votre email</label>
                <input type="email" name="emailInscription" id="emailinscription">
                <label for="passwordinscription">Mot de passe</label>
                <input type="password" name="passwordInscription" id="passwordVerify">
                <label for="passwordVerify">vérification du mot de passe</label>
                <input type="password" name="passwordVerify" id="passwordinscription">
                <button type="submit" id="bouton2" name ="submitInscription" class="interaction">Créer un compte</button>
            </form>
        </main>
        <p><?php echo $this->getMessage() ?></p>

        <footer>
            <div>
                <img src="./src/images/linkedin (1).png" alt="image" class="footerImg interaction" id="linkedin">
            <img src="./src/images/facebook.png" alt="image" class="footerImg interaction" id="facebook">
        </div>
        <img src="./src/images/adrar.png" alt="image" class="footerImg interaction" id="adrar">
            <div>
                <a href="#" class="interaction">à propos</a>
                <a href="#" class="interaction">plan du site</a>
            </div>
        </footer>

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
        </script>
    </body>
    </html>
<?php
        return ob_get_clean();
    }
}
?>
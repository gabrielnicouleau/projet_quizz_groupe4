<?php
include './App/utils/functions.php';
include './App/Model/ModelUser.php';
include './App/manager/manager_user.php';
include './App/view/view_connexion.php';
//chargement des variables d'environnement
require_once './env.local.php';

//chargement de l'autoloader de composer
require_once './vendor/autoload.php';

class ControllerConnexion{
    private ?ModelUser $modelUser;
    private ?ViewIndex $index;

    public function __construct(){
        $this->modelUser = new ManagerUser();
        $this->index = new ViewIndex();
    }

    public function getModelUser(): ?ManagerUser {
        return $this->modelUser;
    }

    public function setModelUser(?ModelUser $modelUser): self {
        $this->modelUser = $modelUser;
        return $this;
    }

    public function getIndex(): ?ViewIndex {
        return $this->index;
    }

    public function setIndex(?ViewIndex $index): self {
        $this->index = $index;
        return $this;
    }

    public function logInUser(){
        if(isset($_POST['submitConnexion'])){
            if(isset($_POST['email']) && !empty($_POST['email'])
            && isset($_POST['password']) && !empty($_POST['password'])){
                if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
                    $email = sanitize($_POST['email']);
                    $password = sanitize($_POST['password']);

                    $this->getModelUser()->setEmail($email)->setPassword($password);

                    $data = $this->getModelUser()->readUserByMail();

                    if(!empty($data)){
                        if(password_verify($password,$data[0]['mdp_utilisateur'])){
                            $_SESSION['id'] = $data[0]['id_utilisateur'];
                            $_SESSION['pseudo'] = $data[0]['pseudo_utilisateur'];
                            $_SESSION['email'] = $data[0]['email_utilisateur'];
                            
                            header('Location:./App/Controller/profil.php');
                            exit;
                        }else{
                            $this->getIndex()->setMessage("Email et/ou mot de passe incorrect !");
                        }
                    }else{
                        $this->getIndex()->setMessage("Email et/ou mot de passe incorrect !");
                    }
                }else{
                    $this->getIndex()->setMessage("L'email n'est pas au bon format !");
                }
            }else{
                $this->getIndex()->setMessage("Veuillez remplir tous les champs !");
            }
        }
    }
    
    public function registerUser():void{
        if(isset($_POST['submitInscription'])){
            if(isset($_POST['pseudoInscription']) && !empty($_POST['pseudoInscription'])
            && isset($_POST['emailInscription']) && !empty($_POST['emailInscription'])
            && isset($_POST['passwordInscription']) && !empty($_POST['passwordInscription'])
            && isset($_POST['passwordVerify']) && !empty($_POST['passwordVerify'])){

                    if(filter_var($_POST['emailInscription'],FILTER_VALIDATE_EMAIL)){
                            if($_POST['passwordInscription'] === $_POST['passwordVerify']){
                                    $pseudo = sanitize($_POST['pseudoInscription']);
                                    $email = sanitize($_POST['emailInscription']);
                                    $password = sanitize($_POST['passwordInscription']);
                                    $password = password_hash($password, PASSWORD_BCRYPT);

                                    $this->getModelUser()->setPseudo($pseudo)->setEmail($email)->setPassword($password);

                                    $data = $this->getModelUser()->readUserByMail();

                                    if(empty($data)){                                       
                                        $this->getIndex()->setMessage($this->getModelUser()->createUser());
                                    }else{
                                        $this->getIndex()->setMessage("Cet email est déjà utilisé par un autre compte !");
                                    }
                            }else{
                                $this->getIndex()->setMessage("Vos deux mots de passe ne correspondent pas !");
                            }
                    }else{
                        $this->getIndex()->setMessage("Votre email n'est pas au bon format !");
                    }
            }else{
                $this->getIndex()->setMessage("Veuillez remplir tous les champs !");
            }
        }
    }

    public function renderViews():void{
        if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
            header('Location:./App/Controller/accueil.php');
            exit;
        }
        $this->logInUser();
        $this->registerUser();
        echo $this->getIndex()->render();
    }
}

$index = new ControllerConnexion();
$index->renderViews();
?>

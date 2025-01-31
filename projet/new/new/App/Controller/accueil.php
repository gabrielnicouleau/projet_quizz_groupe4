<?php
include '../Utils/functions.php';
include '../Model/ModelUser.php';
include '../manager/manager_user.php';
include '../view/view_accueil.php';
class ControllerAccueil{
    private ?ViewAccueil $accueil;

    public function __construct(){
        $this->accueil = new ViewAccueil();
    }

    public function getAccueil(): ?ViewAccueil {
        return $this->accueil;
    }

    public function setAccueil(?ViewAccueil $accueil): self {
        $this->accueil = $accueil;
        return $this;
    }

    public function renderViews():void{
        //Je vérifie si quelqu'un est connecté
        if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
            echo $this->getAccueil()->render();
        } else {
            header('Location:index.php');
            exit;
        }
    }
}
$accueil = new ControllerAccueil();
$accueil->renderViews();
?>
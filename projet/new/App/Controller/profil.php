<?php
include '../utils/functions.php';
include '../Model/ModelUser.php';
include '../manager/manager_user.php';
include '../view/view_profil.php';
class ControllerProfil{
    private ?ViewProfil $profil;

    public function __construct(){
        $this->profil = new ViewProfil();
    }

    public function getProfil(): ?ViewProfil {
        return $this->profil;
    }

    public function setProfil(?ViewProfil $profil): self {
        $this->profil = $profil;
        return $this;
    }

    public function renderViews():void{
        //Je vérifie si quelqu'un est connecté
        if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
            echo $this->getProfil()->render();
        } else {
            header('Location:controller_accueil.php');
            exit;
        }
    }
}
$profil = new ControllerProfil();
$profil->renderViews();

?>
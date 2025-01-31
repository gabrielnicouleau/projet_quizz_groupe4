<?php
include '../utils/functions.php';
include '../Model/ModelUser.php';
include '../manager/manager_user.php';
include '../view/view_quizz.php';
class ControllerQuizz{
    private ?ViewQuizz $quizz;

    public function __construct(){
        $this->quizz = new ViewQuizz();
    }

    public function getQuizz(): ?ViewQuizz {
        return $this->quizz;
    }

    public function setQuizz(?ViewQuizz $quizz): self {
        $this->quizz = $quizz;
        return $this;
    }

    public function renderViews():void{
        //Je vérifie si quelqu'un est connecté
        if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
            echo $this->getQuizz()->render();
        } else {
            header('Location:index.php');
            exit;
        }
    }
}
$accueil = new ControllerQuizz();
$accueil->renderViews();
?>
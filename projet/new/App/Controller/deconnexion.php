<?php
//démarage la session
session_start();

//je détruis la $_SESSION
session_destroy();

//je redirige vers l'accueil
header('Location:../../index.php');
exit;

?>
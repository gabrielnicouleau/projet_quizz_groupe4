<?php
/*Fonction pour enlèver les balises HTML, PHP, les espaces et les caractères d'échappement
* Param : $data -> string
* Return : string
*/
function sanitize($data){
    return htmlentities(strip_tags(stripslashes(trim($data))));
}

//Fonction pour la connection
function connect(){
    $bdd = new PDO('mysql:host=localhost;dbname=quizz','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}
?>
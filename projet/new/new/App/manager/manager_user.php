<?php
class ManagerUser extends ModelUser{
    public function readUsers():array | string{
        try{
            $req = $this->getBdd()->prepare('SELECT id_utilisateur, pseudo_utilisateur, email_utilisateur, mdp_utilisateur FROM utilisateur');
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch(EXCEPTION $error){
            return $error->getMessage();
        }

    }

    function readUserByMail():array |string{
        try{
            $req = $this->getBdd()->prepare('SELECT id_utilisateur, pseudo_utilisateur, mdp_utilisateur, email_utilisateur FROM utilisateur WHERE email_utilisateur = ? LIMIT 1');
            $email = $this->getEmail();
            $req->bindParam(1,$email,PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetchAll();
            return $data;
        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }

    function createUser():string{
        try{
            $req =$this->getBdd()->prepare('INSERT INTO utilisateur (pseudo_utilisateur, email_utilisateur, mdp_utilisateur) VALUES (?,?,?)');
            $pseudo = $this->getPseudo();
            $email = $this->getEmail();
            $password = $this->getPassword();
            $req->bindParam(1,$pseudo,PDO::PARAM_STR);
            $req->bindParam(2,$email,PDO::PARAM_STR);
            $req->bindParam(3,$password,PDO::PARAM_STR);
            $req->execute();

            return "L'utilisateur $pseudo a été enregistré avec succès !";
        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }
}
?>
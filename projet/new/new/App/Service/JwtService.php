<?php

namespace App\Service;

use App\Utils\Tools;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\manager\ManagerUser ;

class JwtService
{

    //Attributs
    private readonly string $key;

    //Constructeur
    public function __construct()
    {
        $this->key = TOKEN_KEY;
        $this->userRepository = new ManagerUser();
    }

    //Méthodes
    //Authentification
    public function authentification(string $email, string $password): bool
    {
        $email = Tools::sanitize($email);
        $password = Tools::sanitize($password);
        $user = $this->userRepository->findByEmail($email);
        //test si l'utilisateur existe 
        if ($user) {
            //test si le mot de passe est correct
            if ($user->verifyPassword($password)) {
                return true;
            }
        }
        return false;
    }

    //Génération du token
    public function genToken(string $email): string
    {
        //construction du JWT
        //Variables pour le token
        $issuedAt   = new \DateTimeImmutable();
        $expire     = $issuedAt->modify('+' . TOKEN_VALIDITY . ' minutes')->getTimestamp();
        $serverName = "your.domain.name";
        $user = $this->userRepository->findByEmail($email);
        //Contenu du token
        $payload = [
            'iat'  => $issuedAt->getTimestamp(),         // Timestamp génération du token
            'iss'  => $serverName,                       // Serveur
            'nbf'  => $issuedAt->getTimestamp(),         // Timestamp empécher date antérieure
            'exp'  => $expire,                           // Timestamp expiration du token
            'id' => $user->getId(),
            'lastname' => $user->getLastname(),
            'firstname' => $user->getFirstname(),
            'email' => $user->getEmail()
        ];
        //retourne le JWT token encode
        $token = JWT::encode(
            $payload,
            $this->key,
            'HS512'
        );
        return $token;
    }

    //Vérification du token
    public function verifyToken(string $jwt): bool|string
    {
        try {
            //Décodage du token
            JWT::decode($jwt, new Key($this->key, 'HS512'));
            return true;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    //Décodage des données du token
    public function getDataFromToken(string $jwt): object
    {
        //Décodage du token
        $token = JWT::decode($jwt, new Key($this->key, 'HS512'));
        return $token;
    }

    //Génération d'un token fake (pour les tests)
    public function genFakeToken(): string
    {
        //construction du JWT
        //Variables pour le token
        $issuedAt   = new \DateTimeImmutable();
        $expire     = $issuedAt->modify('+' . TOKEN_VALIDITY . ' minutes')->getTimestamp();
        $serverName = "your.domain.name";
        $user = "fake";
        $userLastname   = "Doe";
        $userFirstname   =  "John";
        $id   =  1;
        //Contenu du token
        $payload = [
            'iat'  => $issuedAt->getTimestamp(),         // Timestamp génération du token
            'iss'  => $serverName,                       // Serveur
            'nbf'  => $issuedAt->getTimestamp(),         // Timestamp empécher date antérieure
            'exp'  => $expire,                           // Timestamp expiration du token
            'userLastname' => $userLastname,
            'userFirstname' => $userFirstname,
            'userId' => $id,
        ];
        //retourne le token JWT
        $token = JWT::encode(
            $payload,
            $this->key,
            'HS512'
        );
        return $token;
    }
}

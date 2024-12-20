<?php

namespace App\Utils;

use App\Controller\UserController;

class Tools
{
    //Méthode qui retourne une réponse JSON
    public static function JsonResponse(array $data, int $status = 200): void
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        http_response_code($status);
        echo json_encode($data);
    }

    //Méthode qui convertie une chaine de caractéres en UTF-8
    public static function utf8Encode(string $str): string
    {

        return mb_convert_encoding(
            $str,
            "UTF-8",
            mb_detect_encoding($str)
        );
    }

    //Méthode qui nettoie une chaine de caractéres
    public static function sanitize(string $input): string
    {
        $input = trim($input);
        $input = strip_tags($input);
        $input = htmlspecialchars($input, ENT_NOQUOTES);
        return $input;
    }

    //Méthode qui nettoie un tableau de données
    public static function sanitizeArray(array $data): array
    {
        $cleanData = [];
        foreach ($data as $key => $value) {
            $cleanData[$key] = self::sanitize($value);
        }
        return $cleanData;
    }
    //fonction pour récupérer le body de la requête
    public static function getRequestBody(): bool|string
    {
        return file_get_contents('php://input');
    }
}

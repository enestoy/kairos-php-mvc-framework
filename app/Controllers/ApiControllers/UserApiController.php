<?php
namespace App\Controllers\ApiControllers;

use Core\Controller;

class UserApiController extends Controller
{
    public function getUsers()
    {
        $url = "https://jsonplaceholder.typicode.com/users";

        // file_get_contents ile basit fetch (sunucudan)
        $response = @file_get_contents($url);

        if ($response === FALSE) {
            http_response_code(500);
            echo json_encode(['error' => 'Dış API bağlantısı başarısız.']);
            exit;
        }

        header('Content-Type: application/json');
        echo $response;
        exit;
    }
}

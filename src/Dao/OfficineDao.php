<?php


namespace App\Dao;

use PDO;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class OfficineDao extends MainDao
{

    public function getAllOfficines(Request $request, Response $response): Response
    {
        $stmt = $this->conn->prepare("SELECT * FROM officines");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $response->getBody()->write(json_encode($result, JSON_PRETTY_PRINT));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }

}

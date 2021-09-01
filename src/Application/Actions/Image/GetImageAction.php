<?php

declare(strict_types=1);

namespace App\Application\Actions\Image;

use Psr\Http\Message\ResponseInterface as Response;

class GetImageAction extends ImageAction
{
    protected function action(): Response
    {
        $response = new \Slim\Psr7\Response();
        $imageId = (int) $this->resolveArg('id');
        $image = $this->image->find($imageId);
        $response->getBody()->write($image['image']);
        return $response->withHeader('Content-Type', 'image/png')->withStatus(200);
    }
}

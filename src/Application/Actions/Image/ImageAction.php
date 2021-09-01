<?php

declare(strict_types=1);

namespace App\Application\Actions\Image;

use App\Application\Actions\Action;
use App\Domain\Image\Image;
use Psr\Log\LoggerInterface;

abstract class ImageAction extends Action
{
    /**
    * @var Image
    */
    protected $image;
    
    /**
    * @param LoggerInterface $logger
    * @param Image  $image
    */
    public function __construct(LoggerInterface $logger, Image $image)
    {
        parent::__construct($logger);
        $this->image = $image;
    }
    
    protected function parseBody() {
        // parsing from key=value&key2=value2 to [key => value, key2 => value2]
        $data;
        $raw = $this->request->getBody()->getContents();
        if (empty($raw))
            return $this->request->getParsedBody();
        $cutted = explode("&", $raw);
        foreach ($cutted as $param) {
            list($key, $value) = explode("=", $param);
            $data[$key] = $value;
        }
        return $data;
    }
}
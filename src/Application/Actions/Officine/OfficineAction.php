<?php

declare(strict_types=1);

namespace App\Application\Actions\Officine;

use App\Application\Actions\Action;
use App\Domain\Officine\Officine;
use Psr\Log\LoggerInterface;

abstract class OfficineAction extends Action
{
    /**
    * @var Officine
    */
    protected $officine;
    
    /**
    * @param LoggerInterface $logger
    * @param Officine  $officine
    */
    public function __construct(LoggerInterface $logger, Officine $officine)
    {
        parent::__construct($logger);
        $this->officine = $officine;
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
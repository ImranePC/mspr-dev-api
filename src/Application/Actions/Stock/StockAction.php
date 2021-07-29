<?php

declare(strict_types=1);

namespace App\Application\Actions\Stock;

use App\Application\Actions\Action;
use App\Domain\Stock\Stock;
use Psr\Log\LoggerInterface;

abstract class StockAction extends Action
{
    /**
    * @var Stock
    */
    protected $stock;
    
    /**
    * @param LoggerInterface $logger
    * @param Stock  $stock
    */
    public function __construct(LoggerInterface $logger, Stock $stock)
    {
        parent::__construct($logger);
        $this->stock = $stock;
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
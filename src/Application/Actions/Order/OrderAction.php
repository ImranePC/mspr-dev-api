<?php

declare(strict_types=1);

namespace App\Application\Actions\Order;

use App\Application\Actions\Action;
use App\Domain\Order\Order;
use Psr\Log\LoggerInterface;

abstract class OrderAction extends Action
{
    /**
    * @var Order
    */
    protected $order;
    
    /**
    * @param LoggerInterface $logger
    * @param Order  $order
    */
    public function __construct(LoggerInterface $logger, Order $order)
    {
        parent::__construct($logger);
        $this->order = $order;
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
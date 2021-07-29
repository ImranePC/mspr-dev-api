<?php

declare(strict_types=1);

namespace App\Application\Actions\Order;

use Psr\Http\Message\ResponseInterface as Response;
use App\Domain\Order\Order;

class UpdateOrderAction extends OrderAction
{
    protected function action(): Response
    {
        $data = $this->parseBody();
        $orderId = (int) $this->resolveArg('id');
        $order = $this->order->find($orderId);
        foreach($data as $key => $value) {
            if (isset($order->$key))
            $order->$key = $value;
        }
        $order->save();
        return $this->respondWithData($order);
    }
}
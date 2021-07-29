<?php

declare(strict_types=1);

namespace App\Application\Actions\Order;

use Psr\Http\Message\ResponseInterface as Response;

class GetOrderAction extends OrderAction
{
    protected function action(): Response
    {
        $orderId = (int) $this->resolveArg('id');
        $order = $this->order->find($orderId);
        return $this->respondWithData($order);
    }
}
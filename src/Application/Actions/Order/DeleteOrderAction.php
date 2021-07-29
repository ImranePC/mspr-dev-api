<?php

declare(strict_types=1);

namespace App\Application\Actions\Order;

use Psr\Http\Message\ResponseInterface as Response;

class DeleteOrderAction extends OrderAction
{
    protected function action(): Response
    {
        $orderId = (int) $this->resolveArg('id');
        $order = $this->order->destroy($orderId);
        return $this->respondWithData($order);
    }
}    
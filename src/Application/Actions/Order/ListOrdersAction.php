<?php

declare(strict_types=1);

namespace App\Application\Actions\Order;

use Psr\Http\Message\ResponseInterface as Response;

class ListOrdersAction extends OrderAction
{
    protected function action(): Response
    {
        $allOrders = $this->order->all();
        foreach ($allOrders as $order) {
            $order->medic = $order->find($order->id)->medic;
            $order->officine = $order->find($order->id)->officine;
        }
        return $this->respondWithData($allOrders);
    }
}
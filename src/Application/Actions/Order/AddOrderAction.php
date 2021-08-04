<?php

declare(strict_types=1);

namespace App\Application\Actions\Order;

use Psr\Http\Message\ResponseInterface as Response;
use App\Domain\Order\Order;

class AddOrderAction extends OrderAction
{
    protected function action(): Response
    {
        $data = $this->request->getParsedBody();
        $order = new Order;
        $order->amount = $data["amount"];
        $order->medic_id = $data["medic_id"];
        $order->officine_id = $data["officine_id"];
        $order->save();
        return $this->respondWithData($order);
    }
}

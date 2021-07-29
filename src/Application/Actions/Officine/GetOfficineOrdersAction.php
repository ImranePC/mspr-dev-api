<?php


namespace App\Application\Actions\Officine;


use Psr\Http\Message\ResponseInterface as Response;

class GetOfficineOrdersAction extends OfficineAction
{
    public function action(): Response
    {
        $orders = $this->officine->find((int) $this->resolveArg('id'))->orders;
        foreach ($orders as $order) {
            $order->officine = $order->find($order->id)->officine;
            $order->medic = $order->find($order->id)->medic;
        }
        return $this->respondWithData($orders);
    }
}
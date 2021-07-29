<?php

declare(strict_types=1);

namespace App\Application\Actions\Stock;

use Psr\Http\Message\ResponseInterface as Response;
use App\Domain\Stock\Stock;

class AddStockAction extends StockAction
{
    protected function action(): Response
    {
        $data = $this->request->getParsedBody();
        $stock = new Stock;
        $stock->amount = $data["amount"];
        $stock->medic_id = $data["medic_id"];
        $stock->officine_id = $data["officine_id"];
        $stock->save();
        return $this->respondWithData($stock);
    }
}
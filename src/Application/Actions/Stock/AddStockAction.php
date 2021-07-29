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
        $stock->name = $data["name"];
        $stock->save();
        return $this->respondWithData($stock);
    }
}
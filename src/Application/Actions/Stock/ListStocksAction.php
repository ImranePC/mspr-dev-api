<?php

declare(strict_types=1);

namespace App\Application\Actions\Stock;

use Psr\Http\Message\ResponseInterface as Response;

class ListStocksAction extends StockAction
{
    protected function action(): Response
    {
        $allStocks = $this->stock->all();
        foreach ($allStocks as $stock) {
            $stock->medic = $stock->find($stock->id)->medic;
            $stock->officine = $stock->find($stock->id)->officine;
        }
        return $this->respondWithData($allStocks);
    }
}
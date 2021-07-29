<?php

declare(strict_types=1);

namespace App\Application\Actions\Stock;

use Psr\Http\Message\ResponseInterface as Response;

class GetStockAction extends StockAction
{
    protected function action(): Response
    {
        $stockId = (int) $this->resolveArg('id');
        $stock = $this->stock->find($stockId);
        return $this->respondWithData($stock);
    }
}
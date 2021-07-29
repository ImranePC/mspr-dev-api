<?php

declare(strict_types=1);

namespace App\Application\Actions\Stock;

use Psr\Http\Message\ResponseInterface as Response;
use App\Domain\Stock\Stock;

class UpdateStockAction extends StockAction
{
    protected function action(): Response
    {
        $data = $this->parseBody();
        $stockId = (int) $this->resolveArg('id');
        $stock = $this->stock->find($stockId);
        foreach($data as $key => $value) {
            if (isset($stock->$key))
            $stock->$key = $value;
        }
        $stock->save();
        return $this->respondWithData($stock);
    }
}
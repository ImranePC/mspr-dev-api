<?php


namespace App\Application\Actions\Officine;


use App\Domain\Officine\Officine;
use Psr\Http\Message\ResponseInterface as Response;

class GetOfficeStocksAction extends OfficineAction
{
    public function action(): Response
    {
        $stocks = $this->officine->find((int) $this->resolveArg('id'))->stocks;
        foreach ($stocks as $stock) {
            $stock->medic = $stock->find($stock->id)->medic;
        }
        return $this->respondWithData($stocks);
    }
}
<?php

declare(strict_types=1);

namespace App\Application\Actions\Officine;

use Psr\Http\Message\ResponseInterface as Response;
use App\Domain\Officine\Officine;

class UpdateOfficineAction extends OfficineAction
{
    protected function action(): Response
    {
        $data = $this->parseBody();
        $officineId = (int) $this->resolveArg('id');
        $officine = $this->officine->find($officineId);
        foreach($data as $key => $value) {
            if (isset($officine->$key))
            $officine->$key = $value;
        }
        $officine->save();
        return $this->respondWithData($officine);
    }
}
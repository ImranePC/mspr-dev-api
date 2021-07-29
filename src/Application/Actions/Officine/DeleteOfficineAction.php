<?php

declare(strict_types=1);

namespace App\Application\Actions\Officine;

use Psr\Http\Message\ResponseInterface as Response;

class DeleteOfficineAction extends OfficineAction
{
    protected function action(): Response
    {
        $officineId = (int) $this->resolveArg('id');
        $officine = $this->officine->destroy($officineId);
        return $this->respondWithData($officine);
    }
}    
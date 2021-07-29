<?php

declare(strict_types=1);

namespace App\Application\Actions\Officine;

use Psr\Http\Message\ResponseInterface as Response;

class ListOfficinesAction extends OfficineAction
{
    protected function action(): Response
    {
        $allOfficines = $this->officine->all();
        return $this->respondWithData($allOfficines);
    }
}
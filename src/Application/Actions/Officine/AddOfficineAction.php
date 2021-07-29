<?php

declare(strict_types=1);

namespace App\Application\Actions\Officine;

use Psr\Http\Message\ResponseInterface as Response;
use App\Domain\Officine\Officine;

class AddOfficineAction extends OfficineAction
{
    protected function action(): Response
    {
        $data = $this->request->getParsedBody();
        $officine = new Officine;
        $officine->name = $data["name"];
        $officine->employee_amount = $data["employee_amount"];
        $officine->location_lat = $data["location_lat"];
        $officine->location_lng = $data["location_lng"];
        $officine->opening_time = $data["opening_time"];
        $officine->save();
        return $this->respondWithData($officine);
    }
}
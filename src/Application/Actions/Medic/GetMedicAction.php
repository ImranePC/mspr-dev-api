<?php
declare(strict_types=1);

namespace App\Application\Actions\Medic;


use Psr\Http\Message\ResponseInterface as Response;

class GetMedicAction extends MedicAction
{
    protected function action(): Response
    {
        $medicId = (int) $this->resolveArg('id');
        $medic = $this->medic->find($medicId);
        return $this->respondWithData($medic);
    }
}

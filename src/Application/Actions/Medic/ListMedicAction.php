<?php
declare(strict_types=1);

namespace App\Application\Actions\Medic;

use Psr\Http\Message\ResponseInterface as Response;

class ListMedicAction extends MedicAction
{
    protected function action(): Response
    {
        $allMedics = $this->medic->all();
        return $this->respondWithData($allMedics);
    }

}

<?php
declare(strict_types=1);

namespace App\Application\Actions\Medic;


use App\Domain\Medic\Medic;
use Psr\Http\Message\ResponseInterface as Response;

class NewMedicAction extends MedicAction
{
    protected function action(): Response
    {
        $data = $this->request->getParsedBody();
        $medic = new Medic;
        $medic->name = $data["name"];
        $medic->prix = $data["prix"];
        $medic->description = $data["description"];
        $medic->category_id = $data["category_id"];
        $medic->image_id = $data["image_id"];
        $medic->save();
        return $this->respondWithData($medic);
    }
}

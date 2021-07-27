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
        $medic->name_medic = $data["name_medic"];
        $medic->prix = $data["prix"];
        $medic->description = $data["description"];
        $medic->id_cat_fk = $data["id_cat"];
        $medic->id_image_fk = $data["id_img"];
        $medic->save();
        return $this->respondWithData($medic);
    }
}

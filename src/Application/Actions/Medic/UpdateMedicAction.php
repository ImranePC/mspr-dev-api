<?php
declare(strict_types=1);

namespace App\Application\Actions\Medic;

use Psr\Http\Message\ResponseInterface as Response;

class UpdateMedicAction extends MedicAction
{
    protected function action(): Response
    {
        $data = $this->parseBody();
        $medicId = (int) $this->resolveArg('id');
        $medic = $this->medic->find($medicId);
        foreach($data as $key => $value) {
            if (isset($medic->$key))
                $medic->$key = $value;
        }
        $medic->save();
        return $this->respondWithData($medic);
    }

    protected function parseBody() {
        $data = [];
        $raw = $this->request->getBody()->getContents();
        if (empty($raw))
            return $this->request->getParsedBody();
        $cutted = explode("&", $raw);
        foreach ($cutted as $param) {
            list($key, $value) = explode("=", $param);
            $data[$key] = $value;
        }
        return $data;
    }
}

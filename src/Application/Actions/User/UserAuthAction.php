<?php

namespace App\Application\Actions\User;

use Psr\Http\Message\ResponseInterface as Response;

class UserAuthAction extends UserAction
{
    public function action(): Response
    {
        $data = $this->parseBody();
        $result["user"] = $this->user->select()->where('username', $data['username'])->first();

        if ($result["user"] != null) {
            if (password_verify($data['password'], $result["user"]["password"])) {
                $result["connection"] = true;

                return $this->respondWithData($result);
            } else {
                $result["error"] = "FALSE_PASSWORD";
                $result["connection"] = false;
                unset($result["user"]);

                return $this->respondWithData($result);
            }
        } else {
            $result["error"] = "FALSE_USERNAME";
            $result["connection"] = false;
            unset($result["user"]);

            return $this->respondWithData($result);
        }
    }
}

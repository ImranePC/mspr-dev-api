<?php


namespace App\Application\Actions\User;


use Psr\Http\Message\ResponseInterface as Response;

class UserAuthAction extends UserAction
{
    public function action(): Response
    {
        $data = $this->parseBody();
        $result = $this->user->select()->where('username', $data['username'])->first();
        return $this->respondWithData(password_verify($data['password'], $result['password']));
    }
}
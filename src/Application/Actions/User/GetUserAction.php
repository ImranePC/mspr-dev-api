<?php

declare(strict_types=1);

namespace App\Application\Actions\User;

use Psr\Http\Message\ResponseInterface as Response;

class GetUserAction extends UserAction
{
    protected function action(): Response
    {
        $userId = $this->resolveArg('id');
        $user = $this->user->find($userId);
        return $this->respondWithData($user);
    }
}
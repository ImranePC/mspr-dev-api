<?php
declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/offi', function (Group $group) {
        $group->get('', \App\Dao\OfficineDao::class . ":getAllOfficines");
        //$group->get('/{id}', ViewUserAction::class);
    });

    $app->group('/medic', function (Group $group) {
       $group->get('s', \App\Application\Actions\Medic\ListMedicAction::class);
       $group->get('/{id}', \App\Application\Actions\Medic\GetMedicAction::class);
       $group->post('', \App\Application\Actions\Medic\NewMedicAction::class);
       $group->put('/{id}', \App\Application\Actions\Medic\UpdateMedicAction::class);
       $group->delete('/{id}', \App\Application\Actions\Medic\DeleteMedicAction::class);
    });

};

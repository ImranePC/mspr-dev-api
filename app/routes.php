<?php
declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Models\Order;
use App\Application\Actions\Order\AddOrderAction;
use App\Application\Actions\Order\GetOrderAction;
use App\Application\Actions\Order\ListOrdersAction;
use App\Application\Actions\Order\DeleteOrderAction;
use App\Application\Actions\Order\UpdateOrderAction;
use App\Application\Models\Stock;
use App\Application\Actions\Stock\AddStockAction;
use App\Application\Actions\Stock\GetStockAction;
use App\Application\Actions\Stock\ListStocksAction;
use App\Application\Actions\Stock\DeleteStockAction;
use App\Application\Actions\Stock\UpdateStockAction;
use App\Application\Models\Officine;
use App\Application\Actions\Officine\AddOfficineAction;
use App\Application\Actions\Officine\GetOfficineAction;
use App\Application\Actions\Officine\ListOfficinesAction;
use App\Application\Actions\Officine\DeleteOfficineAction;
use App\Application\Actions\Officine\UpdateOfficineAction;
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
        $response->getBody()->write('API MSPR Dev - 2021');
        return $response;
    });

    $app->group('/medic', function (Group $group) {
       $group->get('s', \App\Application\Actions\Medic\ListMedicAction::class);
       $group->get('/{id}', \App\Application\Actions\Medic\GetMedicAction::class);
       $group->post('', \App\Application\Actions\Medic\NewMedicAction::class);
       $group->put('/{id}', \App\Application\Actions\Medic\UpdateMedicAction::class);
       $group->delete('/{id}', \App\Application\Actions\Medic\DeleteMedicAction::class);
    });

    $app->group('/officine', function (Group $group) {
        $group->get('s', ListOfficinesAction::class);
        $group->post('', AddOfficineAction::class);
        $group->get('/{id}', GetOfficineAction::class);
        $group->put('/{id}', UpdateOfficineAction::class);
        $group->delete('/{id}', DeleteOfficineAction::class);
        $group->get('/stocks/{id}', \App\Application\Actions\Officine\GetOfficeStocksAction::class);
        $group->get('/orders/{id}', \App\Application\Actions\Officine\GetOfficineOrdersAction::class);
    });

    $app->group('/stock', function (Group $group) {
        $group->get('s', ListStocksAction::class);
        $group->post('', AddStockAction::class);
        $group->get('/{id}', GetStockAction::class);
        $group->put('/{id}', UpdateStockAction::class);
        $group->delete('/{id}', DeleteStockAction::class);
    });

    $app->group('/order', function (Group $group) {
        $group->get('s', ListOrdersAction::class);
        $group->post('', AddOrderAction::class);
        $group->get('/{id}', GetOrderAction::class);
        $group->put('/{id}', UpdateOrderAction::class);
        $group->delete('/{id}', DeleteOrderAction::class);
    });
};

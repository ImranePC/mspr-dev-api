<?php
declare(strict_types=1);
namespace App\Application\Actions\Medic;

use App\Application\Actions\Action;
use App\Domain\Medic\Medic;
use Psr\Log\LoggerInterface;

abstract class MedicAction extends Action
{
    protected $medic;

    public function __construct(LoggerInterface $logger, Medic $medic)
    {
        parent::__construct($logger);
        $this->medic = $medic;
    }
}

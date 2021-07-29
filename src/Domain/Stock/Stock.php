<?php

namespace App\Domain\Stock;

use App\Domain\Medic\Medic;
use App\Domain\Officine\Officine;

class Stock extends \Illuminate\Database\Eloquent\Model {

    public function medic()
    {
        return $this->belongsTo(Medic::class);
    }

    public function officine()
    {
        return $this->belongsTo(Officine::class);
    }

}
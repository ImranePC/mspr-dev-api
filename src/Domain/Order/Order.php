<?php

namespace App\Domain\Order;

use App\Domain\Medic\Medic;
use App\Domain\Officine\Officine;

class Order extends \Illuminate\Database\Eloquent\Model {

    protected $hidden = array('officine_id', 'medic_id');

    public function medic()
    {
        return $this->belongsTo(Medic::class);
    }

    public function officine()
    {
        return $this->belongsTo(Officine::class);
    }

}
<?php

namespace App\Domain\Officine;

use App\Domain\Order\Order;
use App\Domain\Stock\Stock;

class Officine extends \Illuminate\Database\Eloquent\Model {

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function officine()
    {
        return $this->hasOne(Officine::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
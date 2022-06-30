<?php

namespace App\Domains\Consumer\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "consumers_Carts";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'consumer_id',
        'product_id',
        'quantity',
    ];
}

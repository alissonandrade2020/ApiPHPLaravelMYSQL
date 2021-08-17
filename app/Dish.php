<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Dish extends Model
{
    protected $fillable = ['name', 'price'];

    protected $primaryKey = 'id';

    /**
     * @return hasMany
     */
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}

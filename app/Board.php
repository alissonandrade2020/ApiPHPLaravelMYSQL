<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Board extends Model
{
    protected $fillable = ['number', 'description'];

    /**
     * @return hasMany
     */
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}

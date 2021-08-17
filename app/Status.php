<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    protected $fillable = ['name'];
    protected $table = 'status';

    /**
     * @return hasMany
     */
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    protected $fillable = ['name', 'cpf'];

    /**
     * @return hasMany
     */
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}

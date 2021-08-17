<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class Order extends Model
{
    protected $fillable = ['client_id', 'user_id', 'dish_id', 'board_id', 'status_id'];

    /**
     * @return belongsTo
     */
    public function dish(): belongsTo
    {
        return $this->belongsTo(Dish::class);
    }

    /**
     * @return belongsTo
     */
    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return belongsTo
     */
    public function status(): belongsTo
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * @return belongsTo
     */
    public function board(): belongsTo
    {
        return $this->belongsTo(Board::class);
    }

    /**
     * @return belongsTo
     */
    public function client(): belongsTo
    {
        return $this->belongsTo(Client::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Interest extends Model
{
    protected $fillable = ['user_id', 'payment_id', 'amount'];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

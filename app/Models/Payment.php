<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = ['group_id', 'amount', 'charges', 'status'];

    public function group() : BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

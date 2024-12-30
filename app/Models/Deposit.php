<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Deposit extends Model
{
    protected $table = 'deposits';
    protected $fillable = [
        'amount_deposited',
        'amount_approved',
        'proof_of_deposit',
        'status'
    ];

    public function userDeposits() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

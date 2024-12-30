<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserGroup extends Model
{
    protected $table = 'user_groups';
    protected $fillable = ['group_id', 'status', 'payment_status'];

    public function group() : BelongsTo
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public function userGroups() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

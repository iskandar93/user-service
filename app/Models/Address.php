<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = ['deleted_at', 'deleted_by'];

    public function addressable(): MorphTo
    {
        return $this->morphTo();
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }
}

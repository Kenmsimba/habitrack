<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $guarded = [];   // allows mass assignment of all fields (fast for now)

    protected $casts = [
        'rent'      => 'decimal:2',
        'deposit'   => 'decimal:2',
    ];
}
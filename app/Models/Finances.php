<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Finances extends Model
{
    protected $fillable = [
        'user_id',
        'finance',
        'description',
    ];
}

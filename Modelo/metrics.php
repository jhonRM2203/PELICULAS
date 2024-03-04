<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class metrics extends Model
{
    protected $fillable = ['action_name', 'execution_time'];
}

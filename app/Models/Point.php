<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $fillable = ['customer_id', 'point_in', 'point_out', 'point_balance'];
    protected $dates = ['created_at', 'updated_at'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    public function users()
{
    return $this->hasMany('App\Models\Campaign','user_id','id');
}
}

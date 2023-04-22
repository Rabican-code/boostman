<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    public function campaignItems()
    {
        return $this->hasMany('App\Models\Campaign_item', 'campaign_id', 'id');
    }


}

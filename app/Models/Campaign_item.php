<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Campaign_item extends Model
    {
        use HasFactory;
    public function contacts()
    {
        return $this->belongsToMany(Contact::class,'campaign_contact','campaign_id','contact_id');
    }
    }



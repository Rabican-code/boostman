<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Campaign_item extends Model
    {
        use HasFactory;
    // public function contacts()
    // {
    //     return $this->belongsToMany(Contact::class,'campaign_contact','campaign_id','contact_id');
    // }
    public function contacts()
    {
        return $this->hasManyThrough(
            // required
            'App\Models\Contact', // the related model
            'App\Models\CampaignItem_contact', // the pivot model

            // optional
            'campaign_item_id', // the current model id in the pivot
            'id', // the id of related model
            'id', // the id of current model
            'contact_id' // the related model id in the pivot
        );
    }
    }



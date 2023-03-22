<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
class CampaignController extends Controller
{
    public function store (Request $request,)
    {

        $data= new Campaign();
        $data->name= $request['name'];

        $data->save();
        return redirect('/campaigns');
    }
}

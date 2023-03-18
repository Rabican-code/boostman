<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\campaign_detail;
use App\Models\Campaign_item;
class ItemsDetailsController extends Controller
{
    public function store (Request $request)
    {
        $user= new campaign_detail();
        $user->label= $request['label'];
        $user->content= $request['content'];
        $user->save();
        return redirect('/item/{id}');

    }
     public function show (Request $request,$id)
    {
        $items = campaign_item::find($id);
        return view('campaign_details', compact('items'));
    }

}

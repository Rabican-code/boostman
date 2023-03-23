<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign_item;
class AddItemController extends Controller
{
    public function store (Request $request,$id)
    {

        $data= new Campaign_item();
        $data->name= $request['name'];
        $data->content= $request['content'];
        $data->save();
        return redirect('/campaign_items/{id}');
    }
    public function show (Request $request,$id)
    {
        $items = Campaign_item::find($id);
        return view('item', compact('items'));
    }
    public function update (Request $request,$id)
    {
        $data = Campaign_item::find($id);
        $data->name= $request['name'];

        $data->update();
        return redirect('campaign_items/{id}');
    }
}

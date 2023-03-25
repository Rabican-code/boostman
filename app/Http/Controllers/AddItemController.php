<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign_item;
use App\Models\Campaign;
class AddItemController extends Controller
{
    public function store (Request $request,$id)
    {

        $data= new Campaign_item();
        $data->name = $request['name'];
        $data->content = $request['content'];
        $data->campaign_id = $id;
        $data->save();
        return view('/campaign_items');
    }
    public function show (Request $request,$id, $ci_id=null)
    {
        $items = Campaign_item::where("campaign_id", $id)->get();
        $data = [];
        $data['items'] = $items;
        if(!empty($ci_id)){
            $data['selected_item'] = Campaign_item::find($ci_id);
        }else{
            $data['selected_item'] = $items[0];
        }


        return view('campaign_items')->with($data);
    }
    public function update (Request $request,$id)
    {
        $data = Campaign_item::Find($id);
        $data->content= $request['content'];
        $data->update();
        return view('campaign_items');
    }
    public function fetch()
    {
        return Campaign::with('campaignItems')->get();
    }
}

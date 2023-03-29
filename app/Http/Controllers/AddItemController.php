<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Models\Campaign_item;

class AddItemController extends Controller
{
    public function store(Request $request, $id)
    {
        $data = new Campaign_item();
        $data->name = $request['name'];
        $data->content = $request['content'];
        $data->campaign_id = $id;
        $data->save();
        return redirect()->back();
    }
    public function show(Request $request, $id, $ci_id = null)
    {
        $data = Campaign::Find($id);
        $items = Campaign_item::where("campaign_id", $id)->get();
        $data = [];
        $data['items'] = $items;
        if (!empty($ci_id)) {
            $data['selected_item'] = Campaign_item::find($ci_id);
        } else {
            if (count($items) < 1) {
                $data = new Campaign_item();
                $data->name = request("name") ?: 'john smith';
                $data->content = request('content') ?: 'Demo';
                $data->campaign_id = $id;
                $data->save();
                $items[] = $data;
            }

            $data['selected_item'] = $items[0];
        }
        return view('campaign_items')->with($data);
    }
    public function update(Request $request, $id)
    {
        $data = Campaign_item::Find($id);
        $data->name = $request['name'];
        $data->content = $request['content'];
        $data->update();
        return redirect()->back();
    }
    public function delete(Request $request, $id)
    {
        $items = Campaign_item::find($id);
        $items->delete();
        return redirect()->back();
    }
}

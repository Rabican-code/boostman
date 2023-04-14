<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Campaign_item;

class CampaignController extends Controller
{
    public function store(Request $request,)
    {
        $data = new Campaign();
        $data->name = $request['name'];
        $data->save();
        return redirect('/campaigns');
    }
    public function show()
    {
        // $count = Campaign::withCount('campaignitems')->get();

        $items = Campaign::withCount('campaignitems')->get();

        return view('campaigns', compact('items'));
    }
    public function edit($id)
    {
        $items = Campaign::find($id);
        return view('campaign_edit', compact('items'));
    }
    public function update(Request $request, $id)
    {
        $data = Campaign::Find($id);
        $data->name = $request['name'];
        $data->update();
        return redirect()->back();
    }
    public function delete($id)
    {
        $items = Campaign::find($id);
        $items->delete();
        return redirect()->back();
    }
}

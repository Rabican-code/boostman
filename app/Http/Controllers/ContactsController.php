<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Campaign_item;
use App\Models\CampaignItem_contact;

class ContactsController extends Controller
{
    public function store(Request $request)
    {
        $data = new Contact();
        $data->contact = $request['contact'];
        $data->save();
        return redirect('/contacts');
    }
    public function campaignItemContactStore(Request $request, $id)
    {
        $cp_id = $id;
        $data = new Contact();
        $data->contact = $request['contact'];
        $data->save();
        return redirect()->back()->with($cp_id);
    }
    public function show(Request $request)
    {

        $items = Contact::all();
        return view('/contacts', compact('items'));
    }
    public function contactshow(Request $request)
    {

        $items = Contact::all();
        return view('/contacts', compact('items'));
    }
    public function campaignItemContactShow(Request $request, $id)
    {
        $cp_id = $id;
        $items = Contact::all();

        $data = [];
        $data['cp_id'] = $cp_id;
        $data['items'] = $items;
        $data['campaign'] = Campaign_item::findOrFail($cp_id);


        return view('campaign_item_contacts')->with($data);
    }

    public function edit($id)
    {
        $items = Contact::find($id);

        return view('contact_edit', compact('items'));
    }
    public function update(Request $request, $id)
    {
        $data = Contact::Find($id);
        $data->contact = $request['contact'];
        $data->update();
        return redirect()->back();
    }
    public function delete($id)
    {
        $items = CampaignItem_contact::Where('contact_id',$id);
        $items->delete();
        return redirect()->back();
    }
    public function savedContacts(Request $request, $cp_id)
    {

        if (!$request['contact'] == null) {

            $contacts_id = $request['contact'];
            foreach ($contacts_id as $cid) {

                $doesRelationExist = CampaignItem_contact::where([
                    'contact_id' => $cid,
                    'campaign_item_id' => $cp_id
                ])->count() > 0;

                if(!$doesRelationExist){
                    CampaignItem_contact::create([
                        "campaign_item_id" => $cp_id,
                        "contact_id" => $cid
                    ]);
                }

            }
        }

        return redirect()->back();
    }
}

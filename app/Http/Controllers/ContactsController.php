<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Campaign_item;
class ContactsController extends Controller
{
    public function store (Request $request)
    {
        $data = new Contact();
        $data->contact= $request['contact'];
        $data->save();
        return redirect('/contacts');
    }
    public function show (Request $request,$id)
    {
        $cp_id=$id;
        $items = Contact::all();
        return view('campaign_item_contacts', compact('items','cp_id'));
    }

    public function edit($id)
    { $items = Contact::find($id);

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
        $items = Contact::find($id);
        $items->delete();
        return redirect()->back();
    }
    public function savedcontacts(Request $request, $cp_id){

        $data = Campaign_item::Find($cp_id);
        if(!$request['contact']==null){

            $contacts_id = $request['contact'];
            foreach($contacts_id as $cid){
                $contact = Contact::find($cid);
                $data->contacts()->attach($contact);

            }

            $data->save();


         }
         return redirect()->back();
    }
}

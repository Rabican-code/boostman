<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Models\Campaign_item;
use App\Models\Contact;
use App\Models\Submited_contact;
use Illuminate\Support\Facades\Mail;
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
        $contacts = Contact::get();
        // dd($contacts);
        $data = Campaign::Find($id);
        $items = Campaign_item::where("campaign_id", $id)->get();
        $data = [];
        $data['items'] = $items;
        $data['contacts'] = $contacts;
        // dd($contacts);
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
        return view('campaign_items')->with($data,$contacts);
    }
    public function update(Request $request, $cp_id,)
    {

        $data = Campaign_item::Find($cp_id);
        $data->name = $request['name'];
        $data->content = $request['content'];
        $data->sent_to_day = $request['date'];
        $data->update();
        $contacts_id = $request['contact'];


        foreach($contacts_id as $cid){
            $contact = Contact::find($cid);
            $data->contacts()->attach($contact);
        }

        $data->save();
        return redirect()->back();
    //     $data->emails()->attach($mails);
    //     $mail_data = [
    //     'contact' => $request['contact'],
    //     "name" => $request['name'],
    //     "content" => $request['content']
    // ];
    // $contacts = ($mail_data['contact']);

    // Mail::send("boostmanmail",$mail_data,function($message) use ($mail_data,$contacts){

    //     $message->to($contacts)
    //     ->subject($mail_data['name']);
    // });
    //     return redirect()->back();

    }

    public function delete(Request $request, $id)
    {
        $items = Campaign_item::find($id);
        $items->delete();
        return redirect()->back();
    }
}

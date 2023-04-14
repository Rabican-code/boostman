<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Campaign_item;
class SendMailController extends Controller
{
    public function sendmail(Request $request,$id)
    {

        $data = Campaign_item::Find($id);
        $data->name = $request['name'];
        $data->content = $request['content'];
        $data->sent_to_day = $request['date'];
        $data->campaign_id = $id;
        $data->save();
        $emails = $id ;
        $data->emails()->attach($emails);
        $mail_data = [
        'contact' => $request['contact'],
        "name" => $request['name'],
        "content" => $request['content']
    ];
    $contacts = ($mail_data['contact']);

    Mail::send("boostmanmail",$mail_data,function($message) use ($mail_data,$contacts){

        $message->to($contacts)
        ->subject($mail_data['name']);
    });
        return redirect()->back();
    }
}

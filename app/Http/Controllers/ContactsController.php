<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class ContactsController extends Controller
{
    public function store (Request $request)
    {
        $data = new Contact();
        $data->contact= $request['contact'];
        $data->save();
        return redirect('/contacts');
    }
    public function show ()
    {
        $items = Contact::all();
        return view('contacts', compact('items'));
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
}

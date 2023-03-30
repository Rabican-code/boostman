<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\email;
class ContactsController extends Controller
{
    public function store (Request $request)
    {
        $data = new email();
        $data->email= $request['email'];
        $data->save();
        return redirect('/contacts');
    }
    public function show ()
    {
        $items = email::all();
        return view('contacts', compact('items'));
    }

    public function edit($id)
    { $items = email::find($id);

       return view('contact_edit', compact('items'));
    }
    public function update(Request $request, $id)
    {
        $data = email::Find($id);
        $data->email = $request['email'];
        $data->update();
        return redirect()->back();
    }
    public function delete($id)
    {
        $items = email::find($id);
        $items->delete();
        return redirect()->back();
    }
}

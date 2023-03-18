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

}

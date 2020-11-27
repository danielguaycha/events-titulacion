<?php

namespace App\Http\Controllers;


use App\Mail\ContactMail;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['contact']);
    }

    public function index()
    {
        return view('home');
    }

    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required|max:75',
            'topic' => 'required|max:100',
            'email' => 'required|email',
            'message' => 'required|max:150',
        ]);

        \Mail::to(env('MAIL_CONTACT', 'support@dguaycha.com'))
            ->send(new ContactMail($request->name,
                $request->topic,
                $request->message, $request->email));

        return back()->with('ok', 'Mensaje enviado con éxito');
    }
}

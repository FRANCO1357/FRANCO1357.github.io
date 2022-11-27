<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'subject' => 'required',
            'text' => 'required',
        ],
        [
            'email.required' => 'La mail è obbligatoria',
            'subject.required' => 'L\'oggetto è obbligatorio',
            'text.required' => 'Il testo è obbligatorio',
        ]);

        $data = $request->all();

        $contact = new Contact();

        $contact->fill($data);
        
        $contact->save();

        return redirect()->route('guest.home')->with('message', 'Messaggio inviato con successo')->with('type', 'info');
    }
}

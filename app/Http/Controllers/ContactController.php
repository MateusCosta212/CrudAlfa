<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contatos = Contact::all(); 
        return view('index', compact('contatos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('register.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'contact' => 'required',
            'email' => 'required|email',
        ]);
    
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->contact = $request->input('contact');
        $contact->email = $request->input('email');
        $contact->save();
    
        $contatos = Contact::all(); 

        return view('index', compact('contatos'))->with('success', 'Contato criado com sucesso!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $contato = Contact::find($id); 
    
        return view('edit.edit', compact('contato'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'contact' => 'required',
            'email' => 'required|email',
        ]);
    
        $contact = Contact::find($id);
        $contact->name = $request->input('name');
        $contact->contact = $request->input('contact');
        $contact->email = $request->input('email');
        $contact->save();

        $contatos = Contact::all(); 
        return view('index', compact('contatos'))->with('success', 'Contato atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}

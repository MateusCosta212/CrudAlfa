<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


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
            'name' => ['required', 'string', 'min:6'], // O nome deve ter pelo menos 6 caracteres.
            'contact' => [
                'required',
                'numeric',
                'digits:9',
                Rule::unique('contacts')->where(function ($query) use ($request) {
                    return $query->where('email', $request->email);
                })
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('contacts')->where(function ($query) use ($request) {
                    return $query->where('contact', $request->contact);
                })
            ],
           
        ]);

        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->contact = $request->input('contact');
        $contact->email = $request->input('email');
        $contact->save();
    
        return redirect()->route('contact_list')->with('success', 'Contato criado com sucesso!');
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
            'name' => ['required', 'string', 'min:6'],
            'contact' => ['required', 'numeric', 'digits:9'], 
            'email' => 'required|email',
        ]);
    
        $contact = Contact::find($id);
        $contact->name = $request->input('name');
        $contact->contact = $request->input('contact');
        $contact->email = $request->input('email');
        $contact->save();

        return redirect()->route('contact_list')->with('success', 'Contato atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contato = Contact::findOrFail($id);
        $contato->delete();
        return redirect()->route('contact_list')->with('success', 'Contato excluido com sucesso!');
    }
}

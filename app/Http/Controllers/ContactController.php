<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contacts = Contact::All();

        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cliente' => 'required',
            'vendedor' => 'required',
            'valororcado' => 'required'
        ]);

        $contact = new Contact([
            'cliente' => $request->get('cliente'),
            'vendedor' => $request->get('vendedor'),
            'descricao' => $request->get('descricao'),
            'valororcado' => $request->get('valororcado'),
            'datahora' => $request->get('datahora'),
        ]);
        $contact->save();
        return redirect('/contacts')->with('success', 'Contact saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cliente' => 'required',
            'vendedor' => 'required',
            'valororcado' => 'required'
        ]);

        $contact = Contact::find($id);
        $contact->cliente =  $request->get('cliente');
        $contact->vendedor = $request->get('vendedor');
        $contact->descricao = $request->get('descricao');
        $contact->valororcado = $request->get('valororcado');
        $contact->datahora = $request->get('datahora');
        $contact->save();

        return redirect('/contacts')->with('success', 'Orçamento Atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();

        return redirect('/contacts')->with('success', 'Orçamento Deletado!');
    }
}

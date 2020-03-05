<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'cliente',
        'vendedor',
        'descricao',
        'valororcado',
        'datahora'      
    ];

    public function store(Request $request)
    {
        $request->validate([
            'cliente'=>'required',
            'vendedor'=>'required',
            'valororcado'=>'required'
        ]);

        $contact = new Contact([
            'cliente' => $request->get('cliente'),
            'vendedor' => $request->get('vendedor'),
            'descricao' => $request->get('descricao'),
            'valororcado' => $request->get('valororcado'),
            'datahora' => $request->get('datahora')
        ]);
        $contact->save();
        return redirect('/contacts')->with('success', 'Contact saved!');
    }

    public function create()
    {
        return view('contacts.create');
    }

}



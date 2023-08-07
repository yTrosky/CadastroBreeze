<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;

class UserClientes extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|max:255',
            'endereco' => 'required|max:255',
            'bairro' => 'required|max:255',
            'cep' => 'required|max:255',
            'cidade' => 'required|max:255',
            'estado' => 'required|max:255',
        ]);

            $cliente = new Clientes();
            $cliente ->nome = $request->nome;
            $cliente ->endereco = $request->endereco;
            $cliente ->bairro = $request->bairro;
            $cliente ->cep = $request->cep;
            $cliente ->cidade = $request->cidade;
            $cliente ->estado = $request->estado;
            $cliente ->save();

        return redirect()->route('cadastro')
            ->with('success', 'Agendamento criado com sucesso!');
    }

    public function show(){

        $table = Clientes::all();

        return view('visualizar', ['clientes' => $table]);
    }
}

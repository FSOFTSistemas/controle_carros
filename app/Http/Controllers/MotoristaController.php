<?php

namespace App\Http\Controllers;

use App\Models\Motorista;
use Illuminate\Http\Request;

class MotoristaController extends Controller
{
    public function index()
    {
        $motoristas = Motorista::all();
        return view('motoristas.index', compact('motoristas'));
    }

    public function create()
    {
        return view('motoristas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'apelido' => 'nullable|string|max:255',
            'cpf' => 'required|string|max:14|unique:motoristas,cpf',
            'curso_1' => 'required|file|mimes:pdf|max:2048',
            'curso_2' => 'required|file|mimes:pdf|max:2048',
            'comprovante_residencia' => 'required|file|mimes:pdf|max:2048',
            'antecedente_estadual' => 'required|file|mimes:pdf|max:2048',
            'antecedente_federal' => 'required|file|mimes:pdf|max:2048',
        ]);

        $motorista = new Motorista();
        $motorista->nome = $request->nome;
        $motorista->apelido = $request->apelido;
        $motorista->cpf = $request->cpf;

        // Armazenando os arquivos PDF
        $motorista->curso_1 = $request->file('curso_1')->store('uploads/motoristas', 'public');
        $motorista->curso_2 = $request->file('curso_2')->store('uploads/motoristas', 'public');
        $motorista->comprovante_residencia = $request->file('comprovante_residencia')->store('uploads/motoristas', 'public');
        $motorista->antecedente_estadual = $request->file('antecedente_estadual')->store('uploads/motoristas', 'public');
        $motorista->antecedente_federal = $request->file('antecedente_federal')->store('uploads/motoristas', 'public');

        $motorista->save();

        return redirect()->route('motoristas.index')->with('success', 'Motorista cadastrado com sucesso!');
    }

    public function show(Motorista $motorista)
    {
        return view('motoristas.show', compact('motorista'));
    }

    public function edit(Motorista $motorista)
    {
        return view('motoristas.edit', compact('motorista'));
    }

    public function update(Request $request, Motorista $motorista)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'apelido' => 'nullable|string|max:255',
            'cpf' => 'required|string|max:14|unique:motoristas,cpf,' . $motorista->id,
            'curso_1' => 'nullable|file|mimes:pdf|max:2048',
            'curso_2' => 'nullable|file|mimes:pdf|max:2048',
            'comprovante_residencia' => 'nullable|file|mimes:pdf|max:2048',
            'antecedente_estadual' => 'nullable|file|mimes:pdf|max:2048',
            'antecedente_federal' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $motorista->nome = $request->nome;
        $motorista->apelido = $request->apelido;
        $motorista->cpf = $request->cpf;

        if ($request->hasFile('curso_1')) {
            $motorista->curso_1 = $request->file('curso_1')->store('uploads/motoristas', 'public');
        }
        if ($request->hasFile('curso_2')) {
            $motorista->curso_2 = $request->file('curso_2')->store('uploads/motoristas', 'public');
        }
        if ($request->hasFile('comprovante_residencia')) {
            $motorista->comprovante_residencia = $request->file('comprovante_residencia')->store('uploads/motoristas', 'public');
        }
        if ($request->hasFile('antecedente_estadual')) {
            $motorista->antecedente_estadual = $request->file('antecedente_estadual')->store('uploads/motoristas', 'public');
        }
        if ($request->hasFile('antecedente_federal')) {
            $motorista->antecedente_federal = $request->file('antecedente_federal')->store('uploads/motoristas', 'public');
        }

        $motorista->save();

        return redirect()->route('motoristas.index')->with('success', 'Motorista atualizado com sucesso!');
    }

    public function destroy(Motorista $motorista)
    {
        $motorista->delete();
        return redirect()->route('motoristas.index')->with('success', 'Motorista removido com sucesso!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Motorista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MotoristaController extends Controller
{
    public function index()
    {
        // Recupera todos os motoristas
        $motoristas = Motorista::all();

        // Passa os motoristas para a view
        return view('motoristas.index', compact('motoristas'));
    }

    public function create()
    {
        // Renderiza o formulário de criação
        return view('motoristas.create');
    }

    public function store(Request $request)
    {
        // Validação dos campos
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:motoristas',
            'curso_1' => 'required|file|mimes:pdf',
            'curso_2' => 'required|file|mimes:pdf',
            'cnh' => 'required|file|mimes:pdf',
            'data_vencimento_cnh' => 'required|date',
            'comprovante_residencia' => 'required|file|mimes:pdf',
            'antecedente_estadual' => 'required|file|mimes:pdf',
            'antecedente_federal' => 'required|file|mimes:pdf',
        ]);

        // Salva os arquivos no storage
        $curso1Path = $request->file('curso_1')->store('motoristas/cursos', 'public');
        $curso2Path = $request->file('curso_2')->store('motoristas/cursos', 'public');
        $cnhPath = $request->file('cnh')->store('motoristas/cnh', 'public');
        $comprovantePath = $request->file('comprovante_residencia')->store('motoristas/comprovantes', 'public');
        $estadualPath = $request->file('antecedente_estadual')->store('motoristas/antecedentes', 'public');
        $federalPath = $request->file('antecedente_federal')->store('motoristas/antecedentes', 'public');

        // Cria o registro no banco de dados
        Motorista::create([
            'nome' => $request->nome,
            'apelido' => $request->apelido,
            'cpf' => $request->cpf,
            'curso_1' => $curso1Path,
            'curso_2' => $curso2Path,
            'cnh' => $cnhPath,
            'data_vencimento_cnh' => $request->data_vencimento_cnh,
            'comprovante_residencia' => $comprovantePath,
            'antecedente_estadual' => $estadualPath,
            'antecedente_federal' => $federalPath,
        ]);

        // Redireciona para a lista de motoristas
        return redirect()->route('motoristas.index')->with('success', 'Motorista cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $motorista = Motorista::findOrFail($id);
        return view('motoristas.edit', compact('motorista'));
    }

    public function documentos($id)
{
    // Encontra o motorista pelo ID
    $motorista = Motorista::findOrFail($id);

    // Retorna a view com os documentos
    return view('motoristas.documentos', compact('motorista'));
}


    public function update(Request $request, $id)
    {
        $motorista = Motorista::findOrFail($id);

        // Valida os dados
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => "required|string|max:14|unique:motoristas,cpf,{$motorista->id}",
            'data_vencimento_cnh' => 'required|date',
        ]);

        // Atualiza os arquivos, se enviados
        if ($request->hasFile('curso_1')) {
            Storage::disk('public')->delete($motorista->curso_1);
            $motorista->curso_1 = $request->file('curso_1')->store('motoristas/cursos', 'public');
        }
        if ($request->hasFile('curso_2')) {
            Storage::disk('public')->delete($motorista->curso_2);
            $motorista->curso_2 = $request->file('curso_2')->store('motoristas/cursos', 'public');
        }
        if ($request->hasFile('cnh')) {
            Storage::disk('public')->delete($motorista->cnh);
            $motorista->cnh = $request->file('cnh')->store('motoristas/cnh', 'public');
        }
        if ($request->hasFile('comprovante_residencia')) {
            Storage::disk('public')->delete($motorista->comprovante_residencia);
            $motorista->comprovante_residencia = $request->file('comprovante_residencia')->store('motoristas/comprovantes', 'public');
        }
        if ($request->hasFile('antecedente_estadual')) {
            Storage::disk('public')->delete($motorista->antecedente_estadual);
            $motorista->antecedente_estadual = $request->file('antecedente_estadual')->store('motoristas/antecedentes', 'public');
        }
        if ($request->hasFile('antecedente_federal')) {
            Storage::disk('public')->delete($motorista->antecedente_federal);
            $motorista->antecedente_federal = $request->file('antecedente_federal')->store('motoristas/antecedentes', 'public');
        }

        // Atualiza os dados do motorista
        $motorista->update($request->only([
            'nome', 'apelido', 'cpf', 'data_vencimento_cnh',
        ]));

        // Redireciona para a lista
        return redirect()->route('motoristas.index')->with('success', 'Motorista atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $motorista = Motorista::findOrFail($id);

        // Remove arquivos do storage
        Storage::disk('public')->delete($motorista->curso_1);
        Storage::disk('public')->delete($motorista->curso_2);
        Storage::disk('public')->delete($motorista->cnh);
        Storage::disk('public')->delete($motorista->comprovante_residencia);
        Storage::disk('public')->delete($motorista->antecedente_estadual);
        Storage::disk('public')->delete($motorista->antecedente_federal);

        // Deleta o motorista do banco de dados
        $motorista->delete();

        return redirect()->route('motoristas.index')->with('success', 'Motorista excluído com sucesso!');
    }

    // Método para mostrar detalhes do motorista
    public function show($id)
    {
        $motorista = Motorista::findOrFail($id);

        // Passa os dados do motorista para a view
        return view('motoristas.show', compact('motorista'));
    }
}

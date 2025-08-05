<?php

namespace App\Http\Controllers;

use App\Models\Motorista;
use App\Models\Secretaria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MotoristaController extends Controller
{
    public function index()
    {
        // Carregar motoristas apenas das secretarias do usuário autenticado
        $secretariaIds = Auth::user()->secretarias()->pluck('id');
        $motoristas = Motorista::with('secretaria')
            ->whereIn('secretaria_id', $secretariaIds)
            ->get();
        return view('motoristas.index', compact('motoristas'));
    }

    public function create()
    {
        // Passar todas as secretarias para popular select no form
        $secretarias = Secretaria::all();
        return view('motoristas.create', compact('secretarias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'secretaria_id' => 'nullable|exists:secretarias,id',
            'cpf' => 'required|string|max:14|unique:motoristas,cpf',
            'data_vencimento_cnh' => 'required|date',
        ]);

        try {
            // Forçar maiúsculas
            $nome = strtoupper($request->nome);
            $apelido = strtoupper($request->apelido);

            $curso1Path = $request->hasFile('curso_1') ? $request->file('curso_1')->store('motoristas/cursos', 'public') : '';
            $curso2Path = $request->hasFile('curso_2') ? $request->file('curso_2')->store('motoristas/cursos', 'public') : '';
            $cnhPath = $request->hasFile('cnh') ? $request->file('cnh')->store('motoristas/cnh', 'public') : '';
            $comprovantePath = $request->hasFile('comprovante_residencia') ? $request->file('comprovante_residencia')->store('motoristas/comprovantes', 'public') : '';
            $estadualPath = $request->hasFile('antecedente_estadual') ? $request->file('antecedente_estadual')->store('motoristas/antecedentes', 'public') : '';
            $federalPath = $request->hasFile('antecedente_federal') ? $request->file('antecedente_federal')->store('motoristas/antecedentes', 'public') : '';

            Motorista::create([
                'nome' => $nome,
                'apelido' => $apelido,
                'cpf' => $request->cpf,
                'curso_1' => $curso1Path,
                'curso_2' => $curso2Path,
                'cnh' => $cnhPath,
                'data_vencimento_cnh' => $request->data_vencimento_cnh,
                'comprovante_residencia' => $comprovantePath,
                'antecedente_estadual' => $estadualPath,
                'antecedente_federal' => $federalPath,
                'secretaria_id' => $request->secretaria_id ?? null,
            ]);

            return redirect()->route('motoristas.index')->with('success', 'Motorista cadastrado com sucesso!');
        } catch (\Exception $e) {
            // Tratar erro de forma amigável
            return redirect()->back()->withInput()->with('error', 'Erro ao cadastrar motorista: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $motorista = Motorista::findOrFail($id);
        $secretarias = Secretaria::all();
        return view('motoristas.edit', compact('motorista', 'secretarias'));
    }

    public function update(Request $request, $id)
    {
        try {
            $motorista = Motorista::findOrFail($id);

            $request->validate([
                'nome' => 'required|string|max:255',
                'cpf' => "required|string|max:14|unique:motoristas,cpf,{$motorista->id}",
                'data_vencimento_cnh' => 'required|date',
                'secretaria_id' => 'nullable|exists:secretarias,id',
            ]);

            $motorista->nome = strtoupper($request->nome);
            $motorista->apelido = strtoupper($request->apelido);

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

            // Atualizar os campos restantes, incluindo secretaria_id
            $motorista->cpf = $request->cpf;
            $motorista->data_vencimento_cnh = $request->data_vencimento_cnh;
            $motorista->secretaria_id = $request->secretaria_id ?? null;

            $motorista->save();

            return redirect()->route('motoristas.index')->with('success', 'Motorista atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Erro ao atualizar motorista: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $motorista = Motorista::findOrFail($id);

            Storage::disk('public')->delete($motorista->curso_1);
            Storage::disk('public')->delete($motorista->curso_2);
            Storage::disk('public')->delete($motorista->cnh);
            Storage::disk('public')->delete($motorista->comprovante_residencia);
            Storage::disk('public')->delete($motorista->antecedente_estadual);
            Storage::disk('public')->delete($motorista->antecedente_federal);

            $motorista->delete();

            return redirect()->route('motoristas.index')->with('success', 'Motorista excluído com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao deletar motorista: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $motorista = Motorista::findOrFail($id);
        return view('motoristas.show', compact('motorista'));
    }

    public function documentos($id)
    {
        $motorista = Motorista::findOrFail($id);
        return view('motoristas.documentos', compact('motorista'));
    }
}

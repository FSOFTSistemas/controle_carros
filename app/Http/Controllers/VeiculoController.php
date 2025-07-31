<?php

namespace App\Http\Controllers;

use App\Models\Secretaria;
use App\Models\Veiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class VeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $veiculos = Veiculo::with('secretaria')->get();
        return view('veiculos.index', compact('veiculos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $secretarias = Secretaria::all();
        return view('veiculos.create', compact('secretarias'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'placa'          => 'required|string|max:15|unique:veiculos',
                'modelo'         => 'required|string|max:50',
                'ano'            => 'required|string|max:4',
                'cor'            => 'nullable|string|max:30',
                'crlv'           => 'nullable|file|mimes:pdf',
                'tacografo'      => 'nullable|file|mimes:pdf',
                'vistoria'       => 'nullable|file|mimes:pdf',
                'autorizacao_te' => 'nullable|file|mimes:pdf',
                'certificado_te' => 'nullable|file|mimes:pdf',
                'foto1'          => 'nullable|image|mimes:jpeg,png',
                'foto2'          => 'nullable|image|mimes:jpeg,png',
                'foto3'          => 'nullable|image|mimes:jpeg,png',
                'foto4'          => 'nullable|image|mimes:jpeg,png',
                'foto5'          => 'nullable|image|mimes:jpeg,png',
                'foto6'          => 'nullable|image|mimes:jpeg,png',
                'secretaria_id'  => 'nullable|exists:secretarias,id',
            ]);

            DB::transaction(function () use (&$data, $request) {
                $uniqid = uniqid();

                $data['crlv'] = null;
                $data['tacografo'] = null;
                $data['vistoria'] = null;
                $data['autorizacao_te'] = null;
                $data['certificado_te'] = null;
                // Salvando documentos PDF
                if ($request->hasFile('crlv')) {
                    $data['crlv'] = $request->file('crlv')->storeAs("veiculos/$uniqid", 'crlv.pdf', 'public');
                }

                if ($request->hasFile('tacografo')) {
                    $data['tacografo'] = $request->file('tacografo')->storeAs("veiculos/$uniqid", 'tacografo.pdf', 'public');
                }

                if ($request->hasFile('vistoria')) {
                    $data['vistoria'] = $request->file('vistoria')->storeAs("veiculos/$uniqid", 'vistoria.pdf', 'public');
                }

                if ($request->hasFile('autorizacao_te')) {
                    $data['autorizacao_te'] = $request->file('autorizacao_te')->storeAs("veiculos/$uniqid", 'autorizacao_te.pdf', 'public');
                }

                if ($request->hasFile('certificado_te')) {
                    $data['certificado_te'] = $request->file('certificado_te')->storeAs("veiculos/$uniqid", 'certificado_te.pdf', 'public');
                }

                // Salvando fotos
                for ($i = 1; $i <= 6; $i++) {
                    if ($request->hasFile("foto$i")) {
                        $data["foto$i"] = $request["foto$i"]->storeAs("veiculos/$uniqid", "foto$i.jpg", 'public');
                    }
                }

                // Criando o veículo no banco
                Veiculo::create([
                    'placa' => $data['placa'],
                    'modelo' => $data['modelo'],
                    'ano' => $data['ano'],
                    'cor' => $data['cor'],
                    'crlv' => $data['crlv'],
                    'tacografo' => $data['tacografo'],
                    'vistoria' => $data['vistoria'],
                    'autorizacao_te' => $data['autorizacao_te'],
                    'certificado_te' => $data['certificado_te'],
                    'foto1' => $data['foto1'] ?? null,
                    'foto2' => $data['foto2'] ?? null,
                    'foto3' => $data['foto3'] ?? null,
                    'foto4' => $data['foto4'] ?? null,
                    'foto5' => $data['foto5'] ?? null,
                    'foto6' => $data['foto6'] ?? null,
                    'secretaria_id' => $data['secretaria_id'] ?? null,
                ]);
            });

            return Redirect()->route('veiculos.index')->with('success', 'O veículo foi cadastrado com sucesso!');
        } catch (\Exception $e) {
            dd($e);
            return back()->withErrors(['error' => 'Erro ao cadastrar veículo: ' . $e->getMessage()]);
        }
    }

    public function show(Veiculo $veiculo)
    {
        return view('veiculos.show', compact('veiculo'));
    }

    public function edit($id)
    {
        $veiculo = Veiculo::with('secretaria')->findOrFail($id);
        $secretarias = Secretaria::all();
        return view('veiculos.create', compact('veiculo', 'secretarias')); // Passa o $veiculo para edição
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Busca o veículo pelo ID
        $veiculo = Veiculo::findOrFail($id);

        // Validação dos campos
        $request->validate([
            'placa' => 'required|string|max:15',
            'modelo' => 'required|string|max:50',
            'ano' => 'required|numeric|min:1900|max:' . date('Y'),
            'cor' => 'required|string|max:30',
            'crlv' => 'nullable|file|mimes:pdf',
            'tacografo' => 'nullable|file|mimes:pdf',
            'vistoria' => 'nullable|file|mimes:pdf',
            'autorizacao_te' => 'nullable|file|mimes:pdf',
            'certificado_te' => 'nullable|file|mimes:pdf',
            'foto1' => 'nullable|image|mimes:jpeg,png',
            'foto2' => 'nullable|image|mimes:jpeg,png',
            'foto3' => 'nullable|image|mimes:jpeg,png',
            'foto4' => 'nullable|image|mimes:jpeg,png',
            'foto5' => 'nullable|image|mimes:jpeg,png',
            'foto6' => 'nullable|image|mimes:jpeg,png',
            'secretaria_id' => 'nullable|exists:secretarias,id',
        ]);

        // Atualiza os campos básicos
        $veiculo->update($request->except(['crlv', 'tacografo', 'vistoria', 'autorizacao_te', 'certificado_te', 'foto1', 'foto2', 'foto3', 'foto4', 'foto5', 'foto6']));

        $veiculo->secretaria_id = $request->secretaria_id;

        // Processamento de arquivos (se novos arquivos foram enviados, substitui os antigos)
        $documentos = ['crlv', 'tacografo', 'vistoria', 'autorizacao_te', 'certificado_te'];
        foreach ($documentos as $doc) {
            if ($request->hasFile($doc)) {
                $path = $request->file($doc)->store("veiculos/$id", 'public');
                $veiculo->$doc = $path;
            }
        }

        // Processamento das fotos
        for ($i = 1; $i <= 6; $i++) {
            $campoFoto = "foto{$i}";
            if ($request->hasFile($campoFoto)) {
                $path = $request->file($campoFoto)->store("veiculos/$id", 'public');
                $veiculo->$campoFoto = $path;
            }
        }

        $veiculo->save(); // Salva as alterações no banco

        return redirect()->route('veiculos.index')->with('success', 'Veículo atualizado com sucesso!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Veiculo $veiculo)
    {
        try {
            $veiculo->delete();
            return Redirect()->route('veiculos.index')->with('success', 'O veículo foi excluido');
        } catch (\Exception $e) {
            return Redirect()->back();
        }
    }
}

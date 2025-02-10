<?php

namespace App\Http\Controllers;

use App\Models\Monitor;
use App\Models\Endereco; // Importando o model de Endereco
use Illuminate\Http\Request;

class MonitorController extends Controller
{
    /**
     * Lista todos os monitores.
     */
    public function index()
    {
        $monitores = Monitor::all();
        return view('monitores.index', compact('monitores'));
    }

    /**
     * Mostra o formulário de criação.
     */
    public function create()
    {
        return view('monitores.create');
    }

    /**
     * Salva um novo monitor no banco.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cpf' => 'required|string|max:14|unique:monitors',
            'nome' => 'required|string|max:100',
            'apelido' => 'nullable|string|max:50',
            'telefone' => 'required|string|max:20',
            'endereco.logradouro' => 'required|string|max:255',
            'endereco.numero' => 'required|string|max:20',
            'endereco.bairro' => 'required|string|max:100',
            'endereco.cep' => 'required|string|max:9',
            'endereco.uf' => 'required|string|max:2',
        ]);

        // Criar o monitor primeiro
        $monitor = Monitor::create($request->except('endereco'));

        // Adicionar o monitor_id ao endereço antes de salvar
        $enderecoData = $request->input('endereco');
        $enderecoData['monitor_id'] = $monitor->id; // Definir o monitor_id

        // Criar o endereço já com o monitor_id
        $endereco = Endereco::create($enderecoData);


        return redirect()->route('monitores.index')->with('success', 'Monitor cadastrado com sucesso!');
    }

    /**
     * Exibe os detalhes de um monitor.
     */
    public function show($id)
    {
        $monitor = Monitor::findOrFail($id);
        return view('monitores.show', compact('monitor'));
    }

    /**
     * Mostra o formulário de edição.
     */
    public function edit($id)
    {
        $monitor = Monitor::findOrFail($id);
        return view('monitores.create', compact('monitor'));
    }

    /**
     * Atualiza os dados do monitor.
     */
    public function update(Request $request, $id)
    {
        $monitor = Monitor::findOrFail($id);

        $request->validate([
            'cpf' => 'required|string|max:14|unique:monitors,cpf,' . $id,
            'nome' => 'required|string|max:100',
            'apelido' => 'nullable|string|max:50',
            'telefone' => 'required|string|max:20',
            'endereco.logradouro' => 'required|string|max:255',
            'endereco.numero' => 'required|string|max:20',
            'endereco.bairro' => 'required|string|max:100',
            'endereco.cep' => 'required|string|max:9',
            'endereco.uf' => 'required|string|max:2',
        ]);

        $monitor->update($request->except('endereco'));

        // Atualizando o endereço relacionado
        $endereco = $monitor->endereco;
        $endereco->update($request->input('endereco'));

        return redirect()->route('monitores.index')->with('success', 'Monitor atualizado com sucesso!');
    }

    /**
     * Exclui um monitor.
     */
    public function destroy($id)
    {
        $monitor = Monitor::findOrFail($id);
        $monitor->delete();

        return redirect()->route('monitores.index')->with('success', 'Monitor removido com sucesso!');
    }
}

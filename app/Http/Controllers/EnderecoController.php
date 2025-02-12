<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    /**
     * Exibe todos os endereços.
     */
    public function index()
    {
        $enderecos = Endereco::all(); // Carrega todos os endereços da base de dados
        return view('enderecos.index', compact('enderecos')); // Retorna a view com os endereços
    }

    /**
     * Exibe o formulário para criar um novo endereço.
     */
    public function create()
    {
        return view('enderecos.create'); // Retorna a view para criação
    }

    /**
     * Armazena um novo endereço no banco de dados.
     */
    public function store(Request $request)
    {
        // Validação dos campos do formulário
        $request->validate([
            'logradouro' => 'required|string|max:255',
            'numero' => 'required|string|max:10',
            'bairro' => 'required|string|max:255',
            'cep' => 'required|string|max:10',
            'uf' => 'required|string|max:2',
        ]);

        // Criação do endereço no banco de dados
        Endereco::create($request->all());

        // Redireciona para a página de listagem de endereços com mensagem de sucesso
        return redirect()->route('enderecos.index')->with('success', 'Endereço cadastrado com sucesso!');
    }

    /**
     * Exibe os detalhes de um endereço específico.
     */
    public function show(Endereco $endereco)
    {
        return view('enderecos.show', compact('endereco')); // Exibe a view com o endereço
    }

    /**
     * Exibe o formulário para editar um endereço.
     */
    public function edit(Endereco $endereco)
    {
        return view('enderecos.edit', compact('endereco')); // Retorna a view de edição
    }

    /**
     * Atualiza os dados de um endereço no banco de dados.
     */
    public function update(Request $request, Endereco $endereco)
    {
        // Validação dos campos
        $request->validate([
            'logradouro' => 'required|string|max:255',
            'numero' => 'required|string|max:10',
            'bairro' => 'required|string|max:255',
            'cep' => 'required|string|max:10',
            'uf' => 'required|string|max:2',
        ]);

        // Atualiza o endereço com os novos dados
        $endereco->update($request->all());

        // Redireciona com uma mensagem de sucesso
        return redirect()->route('enderecos.index')->with('success', 'Endereço atualizado com sucesso!');
    }

    /**
     * Remove o endereço do banco de dados.
     */
    public function destroy(Endereco $endereco)
    {
        // Deleta o endereço do banco de dados
        $endereco->delete();

        // Redireciona para a listagem de endereços com uma mensagem de sucesso
        return redirect()->route('enderecos.index')->with('success', 'Endereço excluído com sucesso!');
    }
}

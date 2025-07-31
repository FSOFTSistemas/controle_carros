<?php

namespace App\Http\Controllers;

use App\Models\Secretaria;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SecretariaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $secretarias = Secretaria::all();
        return view('secretarias.index', compact('secretarias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('secretarias._form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nome' => 'required|string|max:255',
            ]);

            Secretaria::create($request->only('nome'));

            return redirect()->back()->with('success', 'Secretaria criada com sucesso.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Secretaria $secretaria)
    {
        return view('secretarias.show', compact('secretaria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Secretaria $secretaria)
    {
        return view('secretarias._form', compact('secretaria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Secretaria $secretaria)
    {
        try {
            $request->validate([
                'nome' => 'required|string|max:255',
            ]);

            $secretaria->update($request->only('nome'));

            return redirect()->route('secretarias.index')->with('success', 'Secretaria atualizada com sucesso.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Secretaria $secretaria)
    {
        try {
            $secretaria->delete();

            return redirect()->route('secretarias.index')->with('success', 'Secretaria excluída com sucesso.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}

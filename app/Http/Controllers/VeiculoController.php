<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $veiculos = Veiculo::all();
        return view('veiculos.index', compact('veiculos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Veiculo $veiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Veiculo $veiculo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Veiculo $veiculo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Veiculo $veiculo)
    {
        //
    }
}

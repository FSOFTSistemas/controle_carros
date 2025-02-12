<?php

namespace App\Http\Controllers;

use App\Models\Monitor;
use App\Models\Motorista;
use App\Models\User;
use App\Models\Veiculo;
use App\Models\Endereco; // Adicionando o modelo Endereco
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $veiculo = Veiculo::count();
        $motorista = Motorista::count();
        $monitor = Monitor::count();
        $users = User::count();
        $enderecos = Endereco::count(); // Contando o número de endereços

        return view('home', compact('veiculo', 'motorista', 'monitor', 'users', 'enderecos')); // Passando a variável 'enderecos'
    }
}

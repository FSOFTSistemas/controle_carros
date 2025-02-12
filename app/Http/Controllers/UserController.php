<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        try {

                    $request->validate([
                        'name' => 'required|string|max:255',
                        'email' => 'required|email|unique:users,email',
                        'password' => 'required|min:8',
                    ]);

                    User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                    ]);

                    return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso!');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    
    public function update(Request $request, $id)
    {
        
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $id,
                'password' => 'nullable|min:6',
            ]);
    
            $data = $request->only(['name', 'email']);
            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->password);
            }
    
            $user = User::find($id);
            $user->update($data);
    
            return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso!');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'Usuário excluído com sucesso!');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}

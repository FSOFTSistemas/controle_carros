<?php

namespace App\Http\Controllers;

use App\Models\Secretaria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $permissions = Permission::all();
        $secretarias = Secretaria::all();
        return view('users.index', compact('users', 'permissions', 'secretarias'));
    }

    public function create()
    {
        $permissions = Permission::all();
        $secretarias = Secretaria::all();
        return view('users.create', compact('permissions', 'secretarias'));
    }

    
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:4',
                'secretarias' => 'nullable|array',
                'secretarias.*' => 'integer|exists:secretarias,id',
                'permissions' => 'nullable|array',
                'permissions.*' => 'string|exists:permissions,name',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            if ($request->has('secretarias')) {
                $user->secretarias()->sync($request->secretarias);
            }

            if ($request->has('permissions')) {
                $user->syncPermissions($request->permissions);
            }

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
                'password' => 'nullable|min:4',
                'secretarias' => 'nullable|array',
                'secretarias.*' => 'integer|exists:secretarias,id',
                'permissions' => 'nullable|array',
                'permissions.*' => 'string|exists:permissions,name',
            ]);
    
            $data = $request->only(['name', 'email']);
            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->password);
            }
    
            $user = User::findOrFail($id);
            $user->update($data);

            if ($request->has('secretarias')) {
                $user->secretarias()->sync($request->secretarias);
            }

            if ($request->has('permissions')) {
                $user->syncPermissions($request->permissions);
            } else {
                // Se nenhuma permissão enviada, remove todas
                $user->syncPermissions([]);
            }
    
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

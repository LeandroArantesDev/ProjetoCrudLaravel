<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index(): View
    {
        // Consulta no banco de dados para listar os usuários
        $users = DB::select('select * from users');

        // Carregar a view
        return view('users.index', ['users' => $users]);
    }

    public function create(): View
    {
        // Carregar a view
        return view('users.create');
    }

    public function store(UserRequest $request): RedirectResponse
    {
        // Validar as informações
        $data = $request->validated();

        // Criar usuário no banco de dados
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        return redirect()->route('users.index')->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function show(User $user): View
    {
        return view('users.show', ['user' => $user]);
    }

    public function edit(User $user): View
    {
        return view('users.edit', ['user' => $user]);
    }

    public function update(UserRequest $request, $id): RedirectResponse
    {
        // Validar as informações
        $data = $request->validated();
        User::where('id', '=', $id)->update(['name' => $data['name'], 'email' => $data['email'], 'password' => $data['password']]);
        return redirect()->route('users.index')->with('success', 'Usuário editado com sucesso!');
    }


    public function destroy($id)
    {
        // Deletar usuário do banco de dados
        User::where('id', '=', $id)->delete();
        // Redirecionar para a index
        return redirect()->route('users.index')->with('success', 'Usuário deletado com sucesso!');
    }
}

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>ProjetoCRUD | Listar</title>
</head>

<body>
    <header class="flex justify-center items-center flex-col font-sans m-3">
        <h1 class="text-2xl text-center font-bold text-blue-800">Bem-vindo ao Projeto CRUD</h1>
        <p class="text-lg text-center text-stone-500">Gerencie seus usuários com facilidade usando nosso sistema CRUD
            simples e
            intuitivo.</p>
    </header>
    <main>
        <div class="flex justify-between items-center p-3 font-sans">
            <p class="text-lg font-bold">Lista de Usuários</p>
            <div class="flex justify-center items-center bg-blue-800 rounded-sm p-1.5 gap-2 text-stone-50">
                <i class="fa-solid fa-plus">
                    <a href="{{ route('users.create') }}"></i>Adicionar novo usuário</a>
            </div>
        </div>

        @if (@session('success'))
            <div
                class="bg-lime-100 p-2 text-lime-500 border-solid border-lime-400 border-1 rounded-sm font-sans m-3 mt-0">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        <div class="overflow-x-auto p-3 w-full">
            <table class="table-auto w-full text-left border-1 border-stone-300 border-collapse">
                <thead class="sticky top-0 p-4 font-normal border-1 border-stone-300">
                    <tr class="bg-stone-50 text-stone-500 text-lg p-3">
                        <th class="p-2 font-normal text-base">ID</th>
                        <th class="p-2 font-normal text-base">Nome</th>
                        <th class="p-2 font-normal text-base">Email</th>
                        <th class="p-2 font-normal text-base">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="border-1 border-stone-300">
                            <td class="p-2 text-base text-nowrap">{{ $user->id }}</td>
                            <td class="p-2 text-base text-nowrap">{{ $user->name }}</td>
                            <td class="p-2 text-base text-nowrap">{{ $user->email }}</td>
                            <td class="p-2 flex gap-2"> <a href="{{ route('users.show', [$user->id]) }}"><i
                                        class="fa-solid fa-eye text-stone-400 text-lg"></i></a>
                                <a href="{{ route('users.edit', [$user->id]) }}"><i
                                        class="fa-solid fa-pen-to-square text-stone-400 text-lg"></i></a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                    onsubmit="return confirm('Tem certeza que deseja deletar este usuário?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"><i
                                            class="fa-solid fa-trash text-stone-400 text-lg"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
    <footer class="flex w-full h-15 border-t-1 border-stone-300 justify-center items-center lg:fixed lg:bottom-0">
        <p class="text-base text-center text-stone-500">Projeto CRUD ©. Feito por Leandro Arantes</p>
    </footer>
</body>

</html>

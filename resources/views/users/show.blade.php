<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>ProjetoCRUD | Visualizar</title>
</head>

<body>
    <header class="flex justify-center items-center flex-col font-sans m-3">
        <h1 class="text-2xl text-center font-bold text-blue-800">Bem-vindo ao Projeto CRUD</h1>
        <p class="text-lg text-center text-stone-500">Gerencie seus usuários com facilidade usando nosso sistema CRUD
            simples e
            intuitivo.</p>
    </header>
    <main class="w-full flex justify-center items-center p-3">
        <form action="{{ route('users.store') }}" method="post"
            class="border-1 border-stone-300 w-full flex flex-col justify-center p-4 rounded-md lg:w-[25%]">
            @csrf
            @method('post')
            <p class="text-lg font-bold mb-3">Cadastrar usuário</p>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div
                        class="bg-red-100 p-2 text-red-500 border-solid border-red-400 border-1 rounded-sm font-sans mb-2 w-full">
                        <p>{{ $error }}</p>
                    </div>
                @endforeach
            @endif
            <div class="flex justify-baseline flex-col my-2">
                <label for="name">Nome</label>
                <p class="border-1 border-stone-300 p-2 rounded-sm">{{ $user->name }}</p>
            </div>
            <div class="flex justify-baseline flex-col my-2">
                <label for="email">E-mail</label>
                <p class="border-1 border-stone-300 p-2 rounded-sm">{{ $user->email }}</p>
            </div>
            <div class="flex justify-baseline flex-col my-2">
                <label for="email">Data da criação</label>
                <p class="border-1 border-stone-300 p-2 rounded-sm">{{ $user->created_at }}</p>
            </div>
            <div class="flex justify-baseline flex-col my-2">
                <label for="email">Data de edição</label>
                <p class="border-1 border-stone-300 p-2 rounded-sm">{{ $user->updated_at }}</p>
            </div>
            <div class="flex justify-baseline items-center mt-3">
                <a href="{{ route('users.index') }}" class="rounded-sm p-1.5 border-1 border-stone-300">Voltar</a>
            </div>
        </form>
    </main>

    <footer class="flex w-full h-15 border-t-1 border-stone-300 justify-center items-center lg:fixed lg:bottom-0">
        <p class="text-base text-center text-stone-500">Projeto CRUD ©. Feito por Leandro Arantes</p>
    </footer>
</body>

</html>

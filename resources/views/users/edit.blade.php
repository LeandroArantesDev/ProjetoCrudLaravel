<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>ProjetoCRUD | Editar </title>
</head>

<body>
    <header class="flex justify-center items-center flex-col font-sans m-3">
        <h1 class="text-2xl text-center font-bold text-blue-800">Bem-vindo ao Projeto CRUD</h1>
        <p class="text-lg text-center text-stone-500">Gerencie seus usuários com facilidade usando nosso sistema CRUD
            simples e
            intuitivo.</p>
    </header>
    <main class="w-full flex justify-center items-center p-3">
        <form action="{{ route('users.update', $user->id) }}" method="post"
            class="border-1 border-stone-300 w-full flex flex-col justify-center p-4 rounded-md lg:w-[25%]">
            @csrf
            @method('put')
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
                <input type="text" name="name" id="name" placeholder="Digite seu nome completo"
                    value="{{ old('name', $user->name) }}" class="border-1 border-stone-300 p-2 rounded-sm">
            </div>
            <div class="flex justify-baseline flex-col my-2">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" placeholder="Digite seu e-mail"
                    value="{{ old('email', $user->email) }}" class="border-1 border-stone-300 p-2 rounded-sm">
            </div>
            <div class="flex justify-baseline flex-col my-2">
                <label for="password">Senha</label>
                <input type="password" name="password" id="password" placeholder="Mínimo 6 caracteres"
                    value="{{ old('password') }}" class="border-1 border-stone-300 p-2 rounded-sm">
            </div>
            <div class="flex justify-between items-center mt-3">
                <a href="{{ route('users.index') }}" class="rounded-sm p-1.5 border-1 border-stone-300">Cancelar</a>
                <input type="submit" value="Editar" class="bg-blue-800 rounded-sm p-1.5 text-stone-50">
            </div>
        </form>
    </main>

    <footer class="flex w-full h-15 border-t-1 border-stone-300 justify-center items-center lg:fixed lg:bottom-0">
        <p class="text-base text-center text-stone-500">Projeto CRUD ©. Feito por Leandro Arantes</p>
    </footer>
</body>

</html>

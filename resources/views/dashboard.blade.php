<x-layout> 
    <main class="py-10">
        <h1>
            Dashboard
        </h1>

        <p>
            Bem vindo(a) {{ auth()->user()->name }}!
        </p>

        <div>
            <h2 class="text-xl mb-4">
                Listagem de hábitos
            </h2>

            <ul class="flex flex-col gap-2">
                @forelse($habits as $item)
                    <li class="pl-4">
                        <div class="flex gap-2 items-center">
                            <p class="font-bold text-xl">
                                - {{$item->name}}
                            </p>
                            <p>
                                [{{$item->HabitLogs->count()}}]
                            </p>
                        </div>
                    </li>
                @empty
                <p>
                    Nenhum hábito cadastrado.
                </p>
                <a href="/habito/cadastrar" class="bg-white p-2 border-2">
                    Cadastre um novo hábito agora
                </a>

                </a>
                @endforelse
            </ul>
        </div>
    </main>

</x-layout>
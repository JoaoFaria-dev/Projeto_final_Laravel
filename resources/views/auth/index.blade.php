<x-layout>

    <div class="py-16 max-w-4xl mx-auto flex flex-col items-center justify-center">

        <div class="mb-8 w-full flex justify-center">
            <a href="{{ route('ideas.index') }}" class="btn btn-outlined text-gray-400 hover:text-white transition">
                Volte para as suas ideias
            </a>

        </div>

        <h1 class="font-extrabold text-5xl text-center mb-10 tracking-tight">
            {{ Auth::user()->name }}
        </h1>

        <div class="flex flex-row gap-6 justify-center items-center">

            <x-layout.card class="px-8 py-4 text-center min-w-[200px] shadow-lg border border-gray-800 bg-gray-900/50">
                <span class="block text-xs text-gray-400 uppercase tracking-wider mb-1">Email</span>
                <span class="font-medium text-lg">{{ Auth::user()->email }}</span>
            </x-layout.card>

            <x-layout.card class="px-8 py-4 text-center min-w-[200px] shadow-lg border border-gray-800 bg-gray-900/50">
                <span class="block text-xs text-gray-400 uppercase tracking-wider mb-1">Nível de Acesso</span>
                <span class="font-medium text-lg uppercase">{{ Auth::user()->role }}</span>
            </x-layout.card>

        </div>

        <div class="gap-30 py-4 flex flex-row justify-center items-center">
            <a href="/user/{{ Auth::user()->id }}/edit" class="btn btn-outlined">Editar usuário</a>
            <form action="{{ route('user.destroy', Auth::user()) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn-outlined text-red-500">Deletar usuário</button>
            </form>
        </div>

    </div>

</x-layout>

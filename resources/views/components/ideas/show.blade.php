<x-layout>

    <div class="py-8 max-w-4xl mx-auto">

        <div class="flex justify-between">
            <a href="{{ route('ideas.index') }}" class="btn btn-outlined">
                Volte para as suas ideias
            </a>

            <div class="gap-x-3 flex items-center">
                <a href="/ideas/{{ $idea->id }}/edit" class="btn btn-outlined">
                    Editar
                </a>

                <form action="{{ route('ideas.destroy', $idea) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn-outlined text-red-500">Delete</button>
                </form>
            </div>
        </div>

        <h1 class="font-bold text-4xl">{{ $idea->title }}</h1>

        <div class="mt-2 flex gap-x-3 items-center space-y-4">
            <x-ideas.status-label status="{{ $idea->status }}" class="mt-5 line-clamp-3">
                {{ $idea->status->label() }}
            </x-ideas.status-label>
            <div class="text-muted-foreground text-sm">
                {{ $idea->created_at->diffForHumans() }}
            </div>

        </div>

        <x-layout.card class="mt-3">
            <div class="text-foreground max-w-none cursor-pointer">{{ $idea->description }}</div>
        </x-layout.card>

        @if (count($idea->links))
            <div>
                <h3 class="font-bold text-xl mt-6">Links</h3>

                <div>
                    @foreach ($idea->links as $link)
                        <x-layout.card :href="$link"> {{ $link }} </x-layout.card>
                    @endforeach
                </div>
            </div>
        @endif

    </div>

</x-layout>

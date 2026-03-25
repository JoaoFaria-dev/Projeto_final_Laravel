<x-layout >
    <div class="max-w-7x1 mx-auto px-4 sm:px-6 lg:px-8">
        <header class="py-2 ">
            <h1 class="text-3xl font-bold">Ideas</h1>
        </header>

        <a href="{{ route('ideas.index') }}" class="btn btn-outlined">
                Volte para as suas ideias
            </a>

        <div class="mt-7">
            <a href="/admin" class="btn {{ request()->has('status') ? 'btn-outlined' : '' }}">
                Todos ({{ $statusContador['all'] }})
            </a>

            @foreach (App\statusIdea::cases() as $status)
                <a href="/admin?status={{ $status->value }}"
                    class="btn {{ request('status') === $status->value ? '' : 'btn-outlined' }}">
                    {{ $status->label() }}
                    <span class="text-xs pl-3">{{ $statusContador->get($status->value) }}</span>
                </a>
            @endforeach
        </div>

        <div class='mt-8 text-muted-foreground'>
            <div class="grid md:grid-cols-2 gap-8">
                @forelse ($ideas as $idea)
                    <x-layout.card >
                        <h3 class="text-foreground text-lg">{{ $idea->title }}</h3>

                        <span class="text-sm text-blue-600">Por: {{ $idea->user->name }}</span>
                        <div class="mt-1">
                            <x-ideas.status-label status="{{ $idea->status }}">
                                {{ $idea->status->label() }}
                            </x-ideas.status-label>
                        </div>
                        <div class="mt-4">{{ $idea->created_at->diffForHumans() }}</div>
                    </x-layout.card>
                @empty
                    <x-layout.card>
                        <p>Sem ideias criadas.</p>
                    </x-layout.card>
                @endforelse
            </div>
        </div>
    </div>
</x-layout>

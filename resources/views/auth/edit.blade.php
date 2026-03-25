<x-layout>
<div class="max-w-7xl mx-auto py-8 px-6">

    <form action="/user/{{ Auth::user()->id }}" method="POST">


        @csrf
        @method('PATCH')

        <div class="space-y-2">
            <div>
                <div class="mt-2 space-y-4">

                    <h3 class="text-foreground text-lg">{{ Auth::user()->name }}</h3>
                    <x-layout.forms.field label="Nome" name="name" />
                    <x-layout.forms.field label="Email" name="email" type="email"
                        placeholder="digite seu email" />
                </div>
            </div>

            <div class="mt-3 flex items-center gap-x-6">
                <button type="submit" class="btn">Salvar
                </button>
            </div>
        </div>
    </form>
    </div>

</x-layout>

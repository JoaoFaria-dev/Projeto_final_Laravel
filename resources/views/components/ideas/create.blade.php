<div class="max-w-7xl mx-auto py-8 px-6">

    <form action="{{ route('ideas.store') }}" method="POST">

        @csrf

        <div class="space-y-2">
            <div>
                <div class="mt-2 space-y-4">
                    <x-layout.forms.field label="Título" name="title" placeholder="Adicione o título" autofocus />

                    <x-layout.forms.field label="Descrição" name="description" type="textarea"
                        placeholder="Descreva sua ideia" />
                </div>


                <fieldset class="fieldset space-y-2 mt-3">
                    <select name="status" class="select">
                        <option disabled selected>Escolha o status da ideia</option>
                        @foreach (App\statusIdea::cases() as $status)
                            <option value="{{ $status->value }}">
                                {{ $status->label() }}
                            </option>
                        @endforeach
                    </select>
                    <x-layout.forms.error name="status" />
                </fieldset>
            </div>

            <div class="mt-3 flex items-center gap-x-6">
                <button type="submit" class="btn">Salvar
                </button>
            </div>
        </div>
    </form>
</div>

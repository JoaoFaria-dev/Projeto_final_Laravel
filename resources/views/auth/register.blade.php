<x-layout>

    <x-layout.forms.form title="Registro" description="Comece a anotar suas ideias">
        <form action="/register" method="POST" class="space-y-6">
            @csrf

            <x-layout.forms.field name="name" label="Nome" />
            <x-layout.forms.field name="email" label="Email" type='email' />
            <x-layout.forms.field name="password" label="Senha" type='password' />
            <x-layout.forms.field name="codigo_secreto" label="Código de acesso"
                placeholder="Caso não tenha, digite 000000" />

            <div class="space-y-2">
                <p>Já tem conta?
                    <a href="/login">Login</a>
                </p>
            </div>
            <button class="btn mt-2">Cadastrar</button>

        </form>

    </x-layout.forms.form>

</x-layout>

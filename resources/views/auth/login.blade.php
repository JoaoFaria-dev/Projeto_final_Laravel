<x-layout>

    <x-layout.forms.form title='Login' description='Faça login na sua conta'>

        <form action="/login" method="POST" class="space-y-6">
            @csrf
            <x-layout.forms.field name="email" label="Email" type='email'/>
            <x-layout.forms.field name="password" label="Senha" type='password'/>
            <div>
                <p>Ainda não tem conta?
                    <a href="/register">Registrar</a>
                </p>
            </div>
            <button class="btn btn-neutral mt-4">Logar</button>
        </form>

    </x-layout.forms.form>

</x-layout>

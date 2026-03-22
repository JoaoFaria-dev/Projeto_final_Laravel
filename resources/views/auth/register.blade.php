<x-layout>

    <x-layout.forms.form title="Registro" description="Comece a anotar suas ideias">
        <form action="/register" method="POST" class="space-y-6">
            @csrf

            <x-layout.forms.field name="name" label="Nome"/>
            <x-layout.forms.field name="email" label="Email" type='email'/>
            <x-layout.forms.field name="password" label="Senha" type='password'/>

            <fieldset class="fieldset space-y-2">
                <legend class="fieldset-legend">Papel</legend>
                <select name="role" class="select">
                    <option disabled selected>Escolha seu papel</option>
                    <option value='admin'>Admin</option>
                    <option value='client'>Membro</option>
                </select>
            </fieldset>
            <x-layout.forms.error name="role" />

            <div class="space-y-2">
                <p>Já tem conta?
                    <a href="/login">Login</a>
                </p>
            </div>
            <button class="btn mt-2">Cadastrar</button>

        </form>

    </x-layout.forms.form>

</x-layout>

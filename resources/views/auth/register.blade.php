<x-layout>

    <form action="/register" method="POST">

        @csrf

        <fieldset>
            <legend>Registro</legend>

            <label class="label">Nome</label>
            <input type="text" name="name" id="name" placeholder="Nome" />
            <x-layout.forms.error name="name"/>

            <label class="label">Email</label>
            <input type="email" name="email" class="input" placeholder="Email" />
            <x-layout.forms.error name="email" />

            <label class="label">Senha</label>
            <input type="password" name="password" class="input" placeholder="Senha" />
            <x-layout.forms.error name="password" />

            <fieldset class="fieldset">
                <legend class="fieldset-legend">Papel</legend>
                <select name="role" class="select">
                    <option disabled selected>Escolha seu papel</option>
                    <option value='admin'>Admin</option>
                    <option value='client'>Membro</option>
                </select>
            </fieldset>
            <x-layout.forms.error name="role" />
            <div>
                <p>Já tem conta?
                    <a href="/login">Login</a>
                </p>
            </div>
            <button class="btn btn-neutral mt-4">Cadastrar</button>
        </fieldset>
    </form>
</x-layout>

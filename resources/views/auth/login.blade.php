<x-layout>
     <form action="/login" method="POST">
        @csrf

        <legend class="fieldset-legend">Login</legend>

            <label class="label">Email</label>
            <input type="email" name="email" class="input" placeholder="Email" />
            <x-layout.forms.error name="email" />

            <label class="label">Senha</label>
            <input type="password" name="password" class="input" placeholder="Senha" />
            <x-layout.forms.error name="password"/>

            <div>
                <p>Ainda não tem conta?
                    <a href="/register">Registrar</a>
                </p>

            </div>

            <button class="btn btn-neutral mt-4">Logar</button>

     </form>

</x-layout>

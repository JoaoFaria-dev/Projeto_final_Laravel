<nav class="border-b border-border px-6">
    <div class="max-w-7x1 mx-auto h-16 flex items-center justify-between">
        <div>
            <a href="">
                <img src="/image/logo.svg" alt="Idea logo" width="100">
            </a>
        </div>

        <div class="flex gap-x-6 items-center">

            @guest
                <a href="/login">Login</a>
                <a href="/register" class=btn>Registrar-se</a>
            @endguest
            @auth
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="btn">
                        Logout
                    </button>
                </form>
            @endauth

        </div>
    </div>
</nav>



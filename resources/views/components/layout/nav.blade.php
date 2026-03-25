<nav class="border-b border-border px-6">
    <div class="max-w-7x1 mx-auto h-16 flex items-center justify-between">
        <div>
            <a href="">
                <img src="/image/logo.svg" alt="Idea logo" width="100">
            </a>
        </div>

        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1 flex gap-2">
                @can('admin')
                    <li><a href="/admin" class="btn btn-outlined">Admin</a></li>
                @endcan
                @auth
                    <a href="/user" class="btn {{ request()->is('user') ? 'btn-outlined' : '' }}">
                        Usuario
                    </a>
                @endauth

            </ul>
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

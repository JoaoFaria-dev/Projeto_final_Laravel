<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate as Gate;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequest $request)
    {

        $nivelAcesso = 'client';


        if ($request->codigo_secreto === '123456') {
            $nivelAcesso = 'admin';
        }



        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $nivelAcesso;
        $user->save();

        Auth::login($user);

        return redirect('/');
    }

    public function createLogin()
    {
        return view('auth.login');
    }

    public function storeLogin(UserLoginRequest $request)
    {

        $credenciais = $request->validated();

        $user = User::where('email', $credenciais['email'])->first();

        if ($user) {
        }

        if (Auth::attempt($credenciais)) {
            $request->session()->regenerate();

            return redirect()->intended('/')->with('sucess', 'You are now logged in.');
        }

        return back()->withErrors([
            'email' => 'As credenciais não coincidem com nossos registros.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function index()
    {
        return view('auth.index');
    }


    public function delete(User $user)
    {
        $user->delete();
        return redirect('/login');
    }

    public function edit()
    {
        return view('auth.edit');
    }

    public function update(Request $request, User $user)
    {

        Gate::authorize('update', $user);
        if ($request->filled('name')) {
            $user->name = $request->name;
        }

        if ($request->filled('email')) {
            $user->email = $request->email;
        }
        $user->save();

        return view('auth.index');
    }
}

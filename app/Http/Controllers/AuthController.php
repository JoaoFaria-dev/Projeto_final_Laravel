<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        Auth::login($user);

        return redirect('/');
    }

    public function createLogin()
    {
        return view('auth.login');
    }

    public function storeLogin(UserRequest $request)
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
}

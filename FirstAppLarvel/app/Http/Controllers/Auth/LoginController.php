<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected function authenticated(Request $request, $user)
    {
    if ($user->isAdmin()) {
        return redirect('/admin/dashboard');
    } elseif ($user->isManager()) {
        return redirect('/manager/dashboard');
    }
    return redirect('/user/dashboard');
}
public function showLoginForm()
{
    
    return view('auth.login');
}
public function login(Request $request)
    {
        // Validation des champs
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // Tentative de connexion
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Redirection selon le type d'utilisateur
            if ($user->type === 'admin') {
                return redirect()->intended('/admin/dashboard');
            } elseif ($user->type === 'manager') {
                return redirect()->intended('/manager/dashboard');
            } else {
                return redirect()->intended('/user/dashboard');
            }
        }

        // Si la connexion échoue
        return back()->withErrors([
            'email' => 'Les informations de connexion ne sont pas correctes.',
        ])->onlyInput('email');
    }
    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
}



    // Autres méthodes du LoginController si nécessaire
}

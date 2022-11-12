<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use InvalidArgumentException;


class AuthController extends Controller {
    public function __construct(private AuthService $authService) { }

    public function getRegister() {
        if (Auth::check()) {
            return redirect('');
        }
        return view("auth.register");
    }

    public function postRegister(Request $request) {
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|same:password-confirm',
            'password-confirm' => 'required|same:password',
        ],
            [
                'username.required' => 'Pole nazwa użytkownika jest wymagane.',
                'username.unique' => 'Podana nazwa użytkownika jest już zajęta.',
                'email.required' => 'Pole e-mail jest wymagane.',
                'email.email' => 'E-mail musi być prawidłowym adresem e-mail.',
                'email.unique' => 'Podany e-mail jest już zajęty.',
                'password.required' => 'Pole hasło jest wymagane.',
                'password.min' => 'Hasło musi mieć co najmniej 6 znaków.',
                'password.same' => 'Hasło i powtórz hasło muszą być zgodne.',
                'password-confirm.required' => 'Pole powtórz hasło jest wymagane.',
                'password-confirm.same' => 'Powtórz hasło i hasło muszą być zgodne.',
            ]);

        $userData = $request->all();
        $this->authService->register($userData);

        return redirect("login")->withSuccess('Użytkownik został pomyślnie zarejestrowany.');
    }

    public function getLogin() {
        if (Auth::check()) {
            return redirect('');
        }
        return view("auth.login");
    }

    public function postLogin(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],
            [
                'email.required' => 'Pole e-mail jest wymagane.',
                'email.email' => 'E-mail musi być prawidłowym adresem e-mail.',
                'password.required' => 'Pole hasło jest wymagane.',
            ]);

        $credentials = $request->only('email', 'password');
        if ($this->authService->login($credentials)) {
            return redirect('');
        }
        return back()->with('errorLogin', 'Logowanie nie powiodło się.')->onlyInput('email');
    }

    public function logout(Request $request) {
        Auth::logout();

        return redirect('/');
    }

    public function getProfile() {
        $user = Auth::user()->only('username', 'email');
        return view("profile.profile", ['user' => $user]);
    }

    public function postProfile(Request $request) {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ],
            [
                'current_password.required' => 'Pole aktualne hasło jest wymagane.',
                'password.required' => 'Pole nowe hasło jest wymagane.',
                'password.min' => 'Nowe hasło musi mieć co najmniej 6 znaków.',
                'password_confirmation.required' => 'Pole powtórz nowe hasło jest wymagane.',
                'password_confirmation.same' => 'Nowe hasło i Powtórz nowe hasło muszą być zgodne.',
            ]);

        try{
            Auth::logoutOtherDevices($request->input('current_password'));
            User::where('email', Auth::user()->email)
                ->update(['password' => Hash::make($request->input('password'))]);
            return back()->with('success', 'Zmiana hasła powiodła się.');
        }catch(InvalidArgumentException $e){
            return back()->with('error', 'Zmiana hasła nie powiodła się.');
        }
    }

}

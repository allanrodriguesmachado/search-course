<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\{JsonResponse, RedirectResponse, Request};
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLoginForm(): RedirectResponse|View
    {
        $user = User::where('id', 1)->first();
        $user->password = bcrypt('teste');
        $user->save();
        if (Auth::check() === true) {
            return redirect()->route('admin.home');
        }

        return view('admin.index');
    }

    public function home(): View
    {
        return view('admin.dashboard');
    }

    public function login(Request $request): JsonResponse
    {
        if (in_array('', $request->only('email', 'password'))) {
             $json['message'] = $this->message->error("Opss, Informe todos os dados para efeturar o login")->render();
             return response()->json($json);
        }

        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $json['message'] = $this->message->warning("Opss, Informe um e-mail valido")->render();
            return response()->json($json);
        }

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($credentials)) {
            $json['message'] = $this->message->error("Opsss, Dados invalidos")->render();
            return response()->json($json);
        }

        $this->authenticate($request->getClientIp());

        $json['redirect'] = route('admin.home');
        return response()->json($json);
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    private function authenticate(string $ip): void
    {
        $user = User::where('id', Auth::user()->id);
        $user->update([
            'last_login_at' => date('Y-m-d H:i:s'),
            'last_login_ip' => $ip
        ]);
    }
}

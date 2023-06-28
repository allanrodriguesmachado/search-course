<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\{JsonResponse, RedirectResponse, Request};
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLoginForm(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
//        $user = User::where('id', 1)->first();
//        $user->password = bcrypt('teste');
//        $user->save();
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

        $json['redirect'] = route('admin.home');
        return response()->json($json);
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}

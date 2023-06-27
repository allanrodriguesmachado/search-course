<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLoginForm(): View
    {
        return view('admin.index');
    }

    public function home(): View
    {
        return view('admin.dashboard');
    }

    public function login(Request $request)
    {

        if (in_array('', $request->only('email', 'password'))) {
             $json['message'] = "Opss, informe todos os dados para efeturar o login";
             return response()->json($json);
        }

        if (!filter_var($request->only('email'), FILTER_SANITIZE_EMAIL)) {
            $json['message'] = "Opss, informe um e-mail valido para continuar";
            return response()->json($json);
        }

        $credentials = $request->validate([
           'email' => 'required|email',
           'password' => 'required'
        ]);

        return $request->all();
    }
}

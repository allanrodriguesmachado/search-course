<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link rel="stylesheet" href="{{url(asset('backend/assets/css/reset.css'))}}"/>
    <link rel="stylesheet" href="{{url(asset('backend/assets/css/boot.css'))}}"/>
    <link rel="stylesheet" href="{{url(asset('backend/assets/css/login.css'))}}"/>

    <link rel="icon" type="image/png" href="{{url(asset('backend/assets/images/favicon.png'))}}"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ImobTech</title>
</head>
<body>

<div class="ajax_response"></div>

<div class="dash_login">
    <div class="dash_login_left">
        <article class="dash_login_left_box">
            <header class="dash_login_box_headline">
                <div class="dash_login_box_headline_logo icon-imob icon-notext"></div>
                <h1>Login</h1>
            </header>

            <form name="login" action="{{route('admin.login.do')}}" method="post" autocomplete="off">
                <label>
                    <span class="field icon-envelope">E-mail:</span>
                    <input type="email" id="email" name="email" placeholder="Informe seu e-mail"/>
                </label>

                <label>
                    <span class="field icon-unlock-alt">Senha:</span>
                    <input type="password" id="password_check" name="password_check" placeholder="Informe sua senha"/>

                    <span class="dash_login_span_right mt-">Esqueceu sua senha?
                      <a target="_blank" href="#" class="transition text-green">Alterar</a>
                    </span>
                </label>

                <button class="gradient gradient-orange radius icon-sign-in">Entrar</button>
            </form>

            <footer>
                <p class="dash_login_left_box_support"> Não tem uma conta?
                    <a target="_blank" href="#" class="transition text-green">Registre-se</a>
                </p>
            </footer>
        </article>
    </div>
    <div class="dash_login_right"></div>
</div>

<script src="{{url(asset('backend/assets/js/jquery.js'))}}"></script>
<script src="{{url(asset('backend/assets/js/login.js'))}}"></script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Agendamento Cirúrgico - HURCG</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('vendor/login/images/icons/favicon.ico') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/login/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/login/vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/login/vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/login/vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/login/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/login/vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/login/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/login/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/login/css/footer.css') }}">
    <!--===============================================================================================-->
</head>
<body>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-t-50 p-b-90">
        @if (isset($errors) && (count($errors) > 0))
            <!-- mostra este bloco se existe uma chave na sessão chamada mensagem-erro -->
                <div class='alert alert-danger' id="error-sgi">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div>
                <img src="{{asset('vendor/login/images/logo.png')}}" alt="" id="logoLogin">
            </div>
            <form class="login100-form validate-form flex-sb flex-w" action="{{Config::get('app.loginRoute')}}" method="POST">
            <span class="login100-form-title p-b-51">
						Agendamento Cirúrgico
            </span>
            @if (Session::has('message'))
                <!-- mostra este bloco se existe uma chave na sessão chamada mensagens-sucesso -->
                    <div class='alert alert-info' id="success-sgi">
                        <ul>
                            <li>{{ Session::get('message') }}</li>
                        </ul>
                    </div>
            @endif
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="wrap-input100 validate-input m-b-16" data-validate = "Nome de usuário obrigatório!">
                    <input class="input100" type="text" name="username" value="{{ old('username') }}" placeholder="Nome de usuário">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input m-b-16" data-validate = "Senha obrigatória!">
                    <input class="input100" type="password" name="password" placeholder="Senha">
                    <span class="focus-input100"></span>
                </div>
                <div class="container-login100-form-btn m-t-17">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>
<!--===============================================================================================-->
<script src="{{ asset('vendor/login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('vendor/login/vendor/animsition/js/animsition.min.js') }}"></script>
<script src="{{ asset('vendor/login/vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('vendor/login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/login/vendor/select2/select2.min.js') }}"></script>
<script src="{{ asset('vendor/login/vendor/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('vendor/login/vendor/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('vendor/login/vendor/countdowntime/countdowntime.js') }}"></script>
<script src="{{ asset('vendor/login/js/main.js') }}"></script>

</body>
{{--@include('footer')--}}
</html>

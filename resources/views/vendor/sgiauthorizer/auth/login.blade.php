@extends(Config::get('sgiauthorizer.view.layout'))

@section(Config::get('sgiauthorizer.view.loginSection'))
    <div class="col-md-offset-4 col-md-4 container">
        @if (isset($errors) && (count($errors) > 0))
            <!-- mostra este bloco se existe uma chave na sessão chamada mensagem-erro -->
            <div class='alert alert-danger'>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (Session::has('mensagem'))
            <!-- mostra este bloco se existe uma chave na sessão chamada mensagens-sucesso -->
            <div class='alert alert-info'>
                <ul>
                    <li>{{ Session::get('mensagem') }}</li>
                </ul>
            </div>
        @endif
        
        <form class="form-horizontal" method="POST" action="{{Config::get('app.loginRoute')}}">
            <fieldset>
                <legend>Login</legend>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="username" name="username" value="{{ old('username') }}" class="form-control input-sm chat-input" placeholder="Usuário">
                </br>
                <input type="password" id="password" name="password" class="form-control input-sm chat-input" placeholder="Senha"/>
                </br>
                <div class="wrapper">
                    <button class="group-btn btn btn-primary" type="submit">Login</button>
                </div>
            </fieldset>
        </form>
    </div>

@stop

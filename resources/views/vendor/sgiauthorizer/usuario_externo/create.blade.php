@extends(Config::get('sgiauthorizer.view.layout'))

@section(Config::get('sgiauthorizer.view.loginSection'))

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
    @if (isset($mensagem) && (count($mensagem) > 0))
        <!-- mostra este bloco se existe uma chave na sessão chamada mensagem -->
        <div class='alert alert-success'>
            <ul>
                <li>{{ $mensagem }}</li>
            </ul>
        </div>
    @endif

    <form class="form-horizontal" method="POST" action="{{Config::get('sgiauthorizer.app.usuarioExterno')}}">
        <fieldset>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <!-- Form Name -->
            <legend><h1>Cadastro de Usuário Externo</h1></legend>

            <!-- Nome input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="nome">Nome: </label>
                <div class="col-md-4">
                    <input id="nome" name="nome" type="text" placeholder="Nome do usuário" value="{{ old('nome') }}" class="form-control input-md">
                </div>
            </div>

            <!-- Cpf input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="cpf">Cpf: </label>
                <div class="col-md-4">
                    <input id="cpf" name="cpf" type="text" placeholder="Cpf do usuário" value="{{ old('cpf') }}" class="form-control input-md">
                    <span id="helpBlock" class="help-block">Digite apenas números no CPF, sem pontos ou traços.</span>
                </div>
            </div>

            <!-- Rg input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="rg">Rg: </label>
                <div class="col-md-4">
                    <input id="rg" name="rg" type="text" placeholder="Rg do usuário" value="{{ old('rg') }}" class="form-control input-md">
                </div>
            </div>

            <!-- email input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="email">Email: </label>
                <div class="col-md-4">
                    <input id="email" name="email" type="email" placeholder="Email do usuário" value="{{ old('email') }}" class="form-control input-md">
                </div>
            </div>

            <!-- Password input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="password">Senha: </label>
                <div class="col-md-4">
                    <input id="password" name="password" type="password" placeholder="Senha do usuário" class="form-control input-md">
                </div>
            </div>

            <!-- Password Confirmation input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="password_confirmation">Confirmação da Senha: </label>
                <div class="col-md-4">
                    <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirmação da senha" class="form-control input-md">
                </div>
            </div>
            
            <!-- Aceita Receber emails da UEPG -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="email_opt_in"></label>
                <div class="col-md-4">
                    <label class="checkbox-inline" for="email_opt_in">
                        <input name="email_opt_in" value="true" type="checkbox">
                        Aceitar receber emails da UEPG.
                    </label>
                </div>
            </div>
            
            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="submit"></label>
                <div class="col-md-8">
                    <button id="submit" name="submit" class="btn btn-success">Cadastrar Usuário Externo</button>
                    <a class="btn btn-small btn-danger" href="{{ Config::get('sgiauthorizer.app.rotaPadrao') }}">Cancelar</a>
                </div>
            </div>

        </fieldset>
    </form>
@stop
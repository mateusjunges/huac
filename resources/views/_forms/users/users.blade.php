@csrf
<div class="box box-success">
    <div class="box-body">
        <div class="row">
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text"
                       autofocus
                       name="name"
                       value="{{ isset($user) ? $user->name : old('name') }}"
                       placeholder="Informe o nome do usuário"
                       class="form-control @error('name') validation-error @enderror"
                       id="name">
                @component('_components.field-error', [
                    'errors' => $errors,
                    'field'  => 'name'
                ])
                @endcomponent
            </div>
            <div class="form-group">
                <label for="username">Nome de usuário:</label>
                <input type="text"
                       name="username"
                       id="username"
                       value="{{ isset($user) ? $user->username : old('username') }}"
                       placeholder="Informe o nome de usuário"
                       class="form-control @error('username') validation-error @enderror">
                @component('_components.field-error', [
                    'errors' => $errors,
                    'field'  => 'username'
                ])
                @endcomponent
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email"
                       name="email"
                       value="{{ isset($user) ? $user->email : old('email') }}"
                       placeholder="Informe o email do usuário:"
                       class="form-control @error('email') validation-error @enderror"
                       id="email">
                @component('_components.field-error', [
                    'errors' => $errors,
                    'field'  => 'email'
                ])
                @endcomponent
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password"
                       name="password"
                       class="form-control @error('password') validation-error @enderror"
                       placeholder="Escolha uma senha:"
                       id="password">
                @component('_components.field-error', [
                    'errors' => $errors,
                    'field'  => 'password'
                ])
                @endcomponent
            </div>
            <div class="form-group">
                <label for="password-confirmation">Confirme sua senha:</label>
                <input type="password"
                       name=" password_confirmation"
                       placeholder="Confirme sua senha!"
                       class="form-control"
                       id="password-confirmation">
            </div>
            <div class="form-group">
                <button class="btn btn-block btn-success">
                    @yield('buttonTitle')
                </button>
            </div>
        </div>
    </div>
</div>

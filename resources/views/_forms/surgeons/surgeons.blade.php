@csrf
<div class="form-group">
    <label for="user">Selecione o usuário:</label>
    <select name="user_id" id="user" class="form-control">
        <option value="">Selecione o usuário</option>
        @if(isset($surgeon))
            @foreach($users as $user)
                <option
                    value="{{ $user->id }}"
                    {{ $surgeon->user_id == $user->id ? 'selected' : '' }}
                >
                    {{ $user->name }}
                </option>
            @endforeach
        @else
            @foreach($users as $user)
                <option
                    value="{{ $user->id }}"
                    {{ $user->id == old('user') ? 'selected' : '' }}
                >
                    {{ $user->name }}
                </option>
            @endforeach
        @endif
    </select>
    @if($errors->has('user_id'))
        <small class="text-danger">{{ $errors->first('user_id') }}</small>
    @endif
</div>
<div class="form-group">
    <label for="crm">CRM:</label>
    <input type="text"
           class="form-control"
           placeholder="Informe o CRM do médico: "
           name="crm"
           id="crm"
           value="{{ isset($surgeon) ? $surgeon->crm : old('crm') }}">
    @if($errors->has('crm'))
        <small class="danger">{{ $errors->first('crm') }}</small>
    @endif
</div>
<div class="form-group">
    <button class="btn btn-group btn-block btn-success">
        @yield('buttonTitle')
    </button>
</div>

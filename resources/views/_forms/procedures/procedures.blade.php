@csrf
<div class="box box-success">
    <div class="box-header">
        <h4>Novo procedimento</h4>
    </div>
    <div class="box-body">
        <div class="form-group">
            <label for="name">Nome do procedimento:</label>
            <input type="text"
                   name="name"
                   value="{{ isset($procedure) ? $procedure->name : old('name') }}"
                   id="name"
                   placeholder="Informe o nome do procedimento"
                   class="form-control @error('name') validation-error @enderror">
            @component('_components.field-error', [
                'errors' => $errors,
                'field'  => 'name'
            ])
            @endcomponent
        </div>
        <div class="form-group">
            <label for="sus-code">Código SUS:</label>
            <input type="text"
                   name="sus_code"
                   value="{{ isset($procedure) ? $procedure->sus_code : old('sus_code') }}"
                   class="form-control @error('sus_code') validation-error @enderror"
                   placeholder="Informe o código sus do procedimento"
                   id="sus-code">
            @component('_components.field-error', [
                'errors' => $errors,
                'field'  => 'sus_code'
            ])
            @endcomponent
        </div>
        <div class="form-group">
            <button class="btn btn-success btn-block">
                @yield('buttonTitle')
            </button>
        </div>

    </div>
</div>

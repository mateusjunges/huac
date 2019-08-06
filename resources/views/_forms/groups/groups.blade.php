@csrf
<div class="box box-success">
    <div class="box-header">
        <h4>Novo grupo</h4>
    </div>
    <div class="box-body">
        <div class="form-group">
            <label for="name">Nome do grupo:</label>
            <input type="text"
                   name="name"
                   placeholder="Informe o nome do grupo"
                   value="{{ isset($group) ? $group->name : old('name') }}"
                   class="form-control @error('name')validation-error @enderror">
            @if($errors->has('name'))
                <span>{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="slug">Slug do grupo:</label>
            <input type="text"
                   id="slug"
                   data-toggle="tooltip"
                   placeholder="Informe o slug do grupo (ou deixe em branco para gerar automaticamente)"
                   name="slug"
                   value="{{ isset($group) ? $group->slug : old('slug') }}"
                   class="form-control @error('slug') validation-error @enderror">
            @if($errors->has('slug'))
                <span class="text-danger">{{ $errors->first('slug') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="permissions">Selecione as permissões:</label>
            <select name="permissions[]"
                    multiple="multiple"
                    id="permissions"
                    class="form-control @error('permissions') validation-error @enderror">
                @foreach($permissions as $permission)
                    <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                @endforeach
            </select>
            @if($errors->has('permissions'))
                <span class="text-danger">{{ $errors->first('permissions') }}</span>
            @endif
        </div>
        <div class="form-group">
            <button class="btn btn-success btn-block">
                @yield('buttonTitle')
            </button>
        </div>

    </div>
</div>

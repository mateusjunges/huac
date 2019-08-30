@csrf
<div class="form-group">
    <label for="patient-name">Nome do paciente</label>
    <input type="text"
           name="name"
           placeholder="Informe o nome do paciente"
           value="{{ isset($patient) ? $patient->name : old('name') }}"
           class="form-control @error('name') validation-error @enderror"
           id="patient-name">
    @component('_components.field-error', [
        'errors' => $errors,
        'field'  => 'name'
    ])
    @endcomponent
</div>
<div class="form-group">
    <label for="medical-record">Prontuário:</label>
    <input type="text"
           id="medical-record"
           placeholder="Informe o prontuário do paciente"
           name="medical_record"
           value="{{ isset($patient) ? $patient->medical_record : old('medical_record') }}"
           class="form-control @error('medical_record') validation-error @enderror">
    @component('_components.field-error', [
        'errors' => $errors,
        'field'  => 'medical_record'
    ])
    @endcomponent
</div>
<div class="form-group">
    <label for="gender">Gênero:</label>
    <select name="gender"
            id="gender"
            class="form-control @error('gender') validation-error @enderror">
        <option value="">Informe o gênero do paciente</option>
        <option value="M" {{ isset($patient) and $patient->gender == "M" ? 'selected' : '' }}>Masculino</option>
        <option value="F" {{ isset($patient) and $patient->gender == "F" ? 'selected' : '' }}>Feminino</option>
        <option value="O" {{ isset($patient) and $patient->gender == "O" ? 'selected' : '' }}>Outro</option>
    </select>
    @component('_components.field-error', [
        'errors' => $errors,
        'field'  => 'gender'
    ])
    @endcomponent
</div>
<div class="form-group">
    <label for="mother_name">Nome da mãe:</label>
    <input type="text"
           name="mother_name"
           placeholder="Informe o nome da mãe do paciente"
           class="form-control @error('mother_name') validation-error @enderror"
           value="{{ isset($patient) ? $patient->mother_name : old('mother_name') }}"
           id="mother-name">
    @component('_components.field-error', [
        'errors' => $errors,
        'field'  => 'mother_name'
    ])
    @endcomponent
</div>
<div class="form-group">
    <label for="birthday-at">Data de nascimento:</label>
    <input type="date"
           name="birthday_at"
           class="form-control @error('birthday_at') validation-error @enderror"
           value="{{ isset($patient) ? $patient->birthday_at : old('birthday_at') }}"
           id="birthday-at">
    @component('_components.field-error', [
        'errors' => $errors,
        'field'  => 'birthday_at'
    ])
    @endcomponent
</div>
<div class="form-group">
    <button class="btn btn-block btn-success">
        @yield('buttonTitle')
    </button>
</div>

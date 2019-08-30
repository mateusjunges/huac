<div class="form-group">
    <label for="patient-name">Nome do paciente</label>
    <input type="text"
           name="name"
           value="{{ isset($patient) ? $patient->name : old('name') }}"
           class="form-control @error('name') validation-error @enderror"
           id="patient-name">
    @if($errors->has('name'))
        <small class="text-danger">{{ $errors->first('name') }}</small>
    @endif
</div>
<div class="form-group">
    <label for="medical-record">Prontuário:</label>
    <input type="text"
           id="medical-record"
           name="medical_record"
           class="form-control @error('medical_record') validation-error @enderror">
</div>

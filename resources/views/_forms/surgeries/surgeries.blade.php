@csrf
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="patient-name">Nome do paciente:</label>
            <input type="text"
                   id="patient-name"
                   name="name"
                   value="{{ isset($patient) ? $patient->name : old('name') }}"
                   placeholder="Informe o nome do paciente"
                   class="form-control @error('name') validation-error @enderror ">
            @component('_components.field-error', [
                'errors' => $errors,
                'field'  => 'name'
            ])
            @endcomponent
        </div>
        <div class="form-group">
            <label for="medical-record">Número do prontuário:</label>
            <input type="text"
                   name="medical_record"
                   id="medical-record"
                   value="{{ isset($patient) ? $patient->medical_record : old('medical_record') }}"
                   placeholder="Informe o prontuário do paciente"
                   class="form-control @error('medical_record') validation-error @enderror ">
            @component('_components.field-error', [
                'errors' => $errors,
                'field'  => 'medical_record'
            ])
            @endcomponent
        </div>
        <div class="form-group">
            <label for="mother-name">Nome da mãe:</label>
            <input type="text"
                   id="mother-name"
                   name="mother_name"
                   value="{{ isset($patient) ? $patient->mother_name : old('mother_name') }}"
                   placeholder="Informe o nome da mãe do paciente"
                   class="form-control @error('mother_name') validation-error @enderror ">
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
                   value="{{ isset($patient) ? $patient->birthday_at : old('birthday_at') }}"
                   placeholder="Informe a data de nascimento:"
                   id="birthday-at"
                   class="form-control @error('name') validation-error @enderror ">
            @component('_components.field-error', [
                 'errors' => $errors,
                 'field'  => 'birthday_at'
             ])
            @endcomponent
        </div>
        <div class="form-group">
            <label for="gender">Gênero:</label>
            <select name="gender"
                    id="gender"
                    class="form-control @error('gender') validation-error @enderror ">
                <option value="">Selecione o gênero:</option>
                <option value="M"
                    @if(isset($patient))
                        @if($patient->gender == "M")
                            selected
                        @endif
                    @else
                        @if(old('gender') == "M")
                            selected
                        @endif
                    @endif
                >Masculino</option>
                <option value="F"
                @if(isset($patient))
                    @if($patient->gender == "F")
                        selected
                    @endif
                @else
                    @if(old('gender') == "F")
                        selected
                    @endif
                @endif
                >Feminino</option>
                <option value="O"
                @if(isset($patient))
                    @if($patient->gender == "O")
                        selected
                    @endif
                @else
                    @if(old('gender') == "O")
                        selected
                    @endif
                @endif>Não especificado</option>
            </select>
            @component('_components.field-error', [
                'errors' => $errors,
                'field'  => 'gender'
            ])
            @endcomponent
        </div>
        <div class="text-center">
            <b>Dados da cirurgia</b>
        </div>
        <div class="form-group">
            <label for="surgical-procedure">Procedimento cirúrgico:</label>
            <select name="procedure_id"
                    id="surgical-procedure"
                    class="form-control @error('name') validation-error @enderror ">
                <option value="">Selecione o procedimento cirúrgico:</option>
                @foreach($procedures as $procedure)
                    @if(isset($surgery))
                        <option value="{{ $procedure->id }}"
                            {{ $surgery->procedure_id == $procedure->id ? 'selected' : '' }}
                        >
                            {{ $procedure->name }}
                        </option>
                    @else
                        <option value="{{ $procedure->id }}"
                            {{ old('procedure_id') == $procedure->id ? 'selected' : '' }}
                        >
                            {{ $procedure->name }}
                        </option>
                    @endif
                @endforeach
            </select>
            @component('_components.field-error', [
                'errors' => $errors,
                'field'  => 'procedure_id'
            ])
            @endcomponent
        </div>
        <div class="form-group">
            <label for="estimated-duration">Tempo de duração estimado:</label>
            <select name="estimated_duration_time"
                    id="estimated-duration"
                    class="form-control @error('estimated_duration') validation-error @enderror ">
                <option value="">Selecione o tempo de duração estimado:</option>
                @for($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}"
                        @if(isset($surgery))
                            @if($surgery->estimated_duration == $i)
                                selected
                            @endif
                        @else
                            @if(old('estimated_duration_time') == $i)
                                selected
                            @endif
                        @endif
                    >{{ $i == 1 ? $i." hora" : $i." horas" }}</option>
                @endfor
            </select>
            @component('_components.field-error', [
                'errors' => $errors,
                'field'  => 'estimated_duration'
            ])
            @endcomponent
        </div>
        <div class="form-group">
            <label for="classification_id">Classificação:</label>
            <select name="surgery_classification_id"
                    id="classification_id"
                    class="form-control @error('name') validation-error @enderror ">
                <option value="">Classifique esta cirurgia:</option>
                @foreach($classifications as $classification)
                    @if(isset($surgery))
                        @if($surgery->surgery_classification_id == $classification->id)
                            <option value="{{ $classification->id }} selected">{{ $classification->name }}</option>
                        @else
                            <option value="{{ $classification->id }}"> {{ $classification->name }}</option>
                        @endif
                    @else
                        @if(old('surgery_classification_id') == $classification->id)
                            <option value="{{ $classification->id }}" selected> {{ $classification->name }}</option>
                        @else
                            <option value="{{ $classification->id }}"> {{ $classification->name }}</option>
                        @endif
                    @endif
                @endforeach
            </select>
            @component('_components.field-error', [
                'errors' => $errors,
                'field'  => 'surgery_classification_id'
            ])
            @endcomponent
        </div>
        <div class="form-group">
            <label for="anesthesia">Anestesia:</label>
            <select name="anesthesia_id"
                    id="anesthesia"
                    class="form-control @error('anesthesia_id') validation-error @enderror ">
                <option value="">Selecione a anestesia:</option>
                @foreach($anesthetics as $anesthesia)
                    @if(isset($surgery))
                        @if($surger->anesthesia_id == $anesthesia->id)
                            <option value="{{ $anesthesia->id }}" selected> {{ $anesthesia->name }}</option>
                        @else
                            <option value="{{ $anesthesia->id }}"> {{ $anesthesia->name }}</option>
                        @endif
                    @else
                        @if($anesthesia->id == old('anesthesia_id'))
                            <option value="{{ $anesthesia->id }}" selected> {{ $anesthesia->name }}</option>
                        @else
                            <option value="{{ $anesthesia->id }}"> {{ $anesthesia->name }}</option>
                        @endif
                    @endif
                @endforeach
            </select>
            @component('_components.field-error', [
                'errors' => $errors,
                'field'  => 'anesthesia_id'
            ])
            @endcomponent
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="head-surgeon">Cirurgião principal:</label>
            <select name="head_surgeon"
                    class="form-control @error('head_surgeon') validation-error @enderror "
                    id="head-surgeon">
                <option value="0">Selecione o cirurgião principal:</option>
                @if(isset($surgery))
                    @foreach($surgeons as $surgeon)
                        @if(($surgery->headSurgeon->surgeon_id == $surgeon->id) or (old('head_surgeon') == $surgeon->id))
                            <option value="{{ $surgeon->id }}" selected>{{ $surgeon->name }}</option>
                        @else
                            <option value="{{ $surgeon->id }}">{{ $surgeon->name }}</option>
                        @endif
                    @endforeach
                @else
                    @foreach($surgeons as $surgeon)
                        @if(old('head_surgeon') == $surgeon->id)
                            <option value="{{ $surgeon->id }}" selected>{{ $surgeon->name }}</option>
                        @else
                            <option value="{{ $surgeon->id }}">{{ $surgeon->name }}</option>
                        @endif
                    @endforeach
                @endif
            </select>
            @component('_components.field-error', [
                'errors' => $errors,
                'field'  => 'head_surgeon'
            ])
            @endcomponent
        </div>
        <div class="form-group">
            <label for="assistant-surgeon">Cirurgião auxiliar:</label>
            <select name="assistant_surgeon"
                    class="form-control @error('assistant_surgeon') validation-error @enderror "
                    id="assistant-surgeon">
                <option value="0">Selecione o cirurgião auxiliar:</option>
                @if(isset($surgery) && $surgery->assistantSurgeon != null)
                    @foreach($surgeons as $surgeon)
                        @if($surgery->assistantSurgeon->surgeon_id == $surgeon->id)
                            <option value="{{ $surgeon->id }}" selected>{{ $surgeon->name }}</option>
                        @else
                            <option value="{{ $surgeon->id }}">{{ $surgeon->name }}</option>
                        @endif
                    @endforeach
                @else
                    @foreach($surgeons as $surgeon)
                        @if(old('assistant_surgeon') == $surgeon->id)
                            <option value="{{ $surgeon->id }}" selected>{{ $surgeon->name }}</option>
                        @else
                            <option value="{{ $surgeon->id }}">{{ $surgeon->name }}</option>
                        @endif
                    @endforeach
                @endif
            </select>
            @component('_components.field-error', [
                'errors' => $errors,
                'field'  => 'assistant_surgeon'
            ])
            @endcomponent
        </div>
        <div class="form-group">
            <label for="materials">Materiais solicitados:</label>
            <textarea name="materials"
                      id="materials"
                      cols="30"
                      placeholder="Informe os materiais solicitados:"
                      rows="10"
                      class="form-control
                      @error('materials')
                        validation-error
                    @enderror ">{{ isset($surgery) ? $surgery->materials : old('materials') }}</textarea>
            @component('_components.field-error', [
                'errors' => $errors,
                'field'  => 'materials'
            ])
            @endcomponent
        </div>
        <div class="form-group">
            <label for="observation">Observação:</label>
            <textarea
                id="observation"
                cols="30"
                rows="5"
                placeholder="Possui alguma observação?"
                class="form-control @error('observation') validation-error @enderror "
                name="observation">{{ isset($surgery) ? $surgery->observation : old('observation') }}</textarea>
            @component('_components.field-error', [
                'errors' => $errors,
                'field'  => 'observation'
            ])
            @endcomponent
        </div>
        <div class="form-group">
            <label for="anesthetic-evaluation">Avaliação anestésica:</label>
            <textarea
                id="anesthetic-evaluation"
                cols="30"
                rows="5"
                placeholder="Avaliação anestésica"
                class="form-control @error('anesthetic_evaluation') validation-error @enderror "
                name="anesthetic_evaluation">{{ isset($surgery) ? $surgery->anesthetic_evaluation : old('anesthetic_evaluation') }}</textarea>
            @component('_components.field-error', [
                'errors' => $errors,
                'field'  => 'anesthetic_evaluation'
            ])
            @endcomponent
        </div>
    </div>
</div>
<div class="row">
    <button class="btn btn-success btn-lg btn-block">
        @yield('buttonTitle')
    </button>
</div>

@csrf
<div class="row">
    <div class="col-md-6">
        <div class="form-group"
             data-toggle="tooltip" data-placement="top" title="Neste campo você precisa informar o nome do paciente">
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
        <div class="form-group"
             data-toggle="tooltip" data-placement="top" title="Neste campo você precisa informar o número do prontuário do paciente">
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
        <div class="form-group"
             data-toggle="tooltip" data-placement="top" title="Neste campo você precisa informar o nome da mãe do paciente">
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
        <div class="form-group"
             data-toggle="tooltip" data-placement="top" title="Neste campo você precisa informar a data de nascimento do paciente">
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
        <div class="form-group"
             data-toggle="tooltip" data-placement="top" title="Neste campo você precisa informar o gênero sexual do paciente">
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
        <div class="form-group"
             data-toggle="tooltip" data-placement="top" title="Neste campo você precisa selecionar o procedimento cirúrgico que vai ser realizado">
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
        <div class="form-group"
             data-toggle="tooltip" data-placement="top" title="Neste campo você precisa informar o tempo de duração estimado do procedimento selecionado">
            <label for="estimated-duration">Tempo de duração estimado:</label>
            <select name="estimated_duration_time"
                    id="estimated-duration"
                    class="form-control @error('estimated_duration') validation-error @enderror ">
                <option value="">Selecione o tempo de duração estimado:</option>
                @for($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}"
                        @if(isset($surgery))
                            @if($surgery->estimated_duration_time == $i)
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
        <div class="form-group"
             data-toggle="tooltip" data-placement="top" title="Neste campo você precisa informar a classificação desta cirurgia">
            <label for="classification_id">Classificação:</label>
            <select name="surgery_classification_id"
                    id="classification_id"
                    class="form-control @error('name') validation-error @enderror ">
                <option value="">Classifique esta cirurgia:</option>
                @if(isset($surgery))
                    @foreach($classifications as $classification)
                        @if($surgery->surgery_classification_id == $classification->id)
                            <option value="{{ $classification->id }}" selected>{{ $classification->name }}</option>
                        @else
                            <option value="{{ $classification->id }}"> {{ $classification->name }}</option>
                        @endif
                    @endforeach
                @else
                    @foreach($classifications as $classification)
                        @if(old('surgery_classification_id') == $classification->id)
                            <option value="{{ $classification->id }}" selected> {{ $classification->name }}</option>
                        @else
                            <option value="{{ $classification->id }}"> {{ $classification->name }}</option>
                        @endif
                    @endforeach
                @endif

            </select>
            @component('_components.field-error', [
                'errors' => $errors,
                'field'  => 'surgery_classification_id'
            ])
            @endcomponent
        </div>
        <div class="form-group"
             data-toggle="tooltip" data-placement="top" title="Neste campo você precisa selecionar o tipo de anestesia necessário para este procedimento">
            <label for="anesthesia">Anestesia:</label>
            <select name="anesthesia_id[]"
                    id="anesthesia"
                    multiple="multiple"
                    class="form-control @error('anesthesia_id') validation-error @enderror ">
                <option value="">Selecione a anestesia:</option>
                @foreach($anesthetics as $anesthesia)
                    @if(isset($surgery))
                        @if($surgery->hasAnesthesia($anesthesia->id))
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
        <div class="form-group"
             data-toggle="tooltip" data-placement="top" title="Neste campo você precisa selecionar o cirurgião principal, que vai realizar este procedimento.">
            <label for="head-surgeon">Cirurgião principal:</label>
            <select name="head_surgeon"
                    class="form-control @error('head_surgeon') validation-error @enderror "
                    id="head-surgeon">
                @if(isset($surgery))
                    @foreach($surgeons as $surgeon)
                        @if(($surgery->headSurgeon()->first()->id == $surgeon->id) or (old('head_surgeon') == $surgeon->id))
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
        <div class="form-group"
             data-toggle="tooltip" data-placement="top"
             title="Este campo é opcional. Se quiser, você pode informar o cirurgião auxiliar que ajudará na realização deste procedimento">
            <label for="assistant-surgeon">Cirurgião auxiliar:</label>
            <select name="assistant_surgeon"
                    class="form-control @error('assistant_surgeon') validation-error @enderror "
                    id="assistant-surgeon">
                <option value="0">Esta cirurgia não possui cirurgião auxiliar</option>
                @if(isset($surgery) && $surgery->assistantSurgeon()->first() != null)
                    @foreach($surgeons as $surgeon)
                        @if($surgery->assistantSurgeon()->first()->id == $surgeon->id)
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
        <div class="form-group"
             data-toggle="tooltip" data-placement="top"
             title="Neste campo você precisa informar os materiais que são necessários para a realização deste procedimento">
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
        <div class="form-group"
             data-toggle="tooltip" data-placement="top" title="Quer adicionar uma observação? Se sim, preencha este campo">
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
        <div class="form-group"
             data-toggle="tooltip" data-placement="top"
             title="Neste campo você precisa informar a data da avaliação anestésica, ou informações relacionadas. Esta informação é opcional">
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
    <button class="btn btn-success btn-lg btn-block"
            data-toggle="tooltip" data-placement="top"
            title="Ao clicar neste botão, uma solicitação de cirurgia será criada, e o agendamento seguirá com o processo.">
        @yield('buttonTitle')
    </button>
</div>

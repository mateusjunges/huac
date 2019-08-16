@csrf
<div class="box box-success">
    <div class="box-header">
        <h4><b>Nova sala</b></h4>
    </div>
    <div class="box-body">
        <div class="form-group">
            <label for="name">Nome da sala:</label>
            <input type="text"
                   name="name"
                   placeholder="Informe o nome da sala"
                   value="{{ isset($room) ? $room->name : old('name') }}"
                   class="form-control @error('name')validation-error @enderror">
            @if($errors->has('name'))
                <span>{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="time">Horário de início do bloqueio da sala no período da manhã:</label>
            <input type="time"
                   id="time"
                   name="morning_reservation_starts_at"
                   placeholder="Informe o horário desejado"
                   value="{{ isset($room) ? $room->time : old('morning_reservation_starts_at') }}"
                   class="form-control @error('time')validation-error @enderror">
            @if($errors->has('morning_reservation_starts_at'))
                <span>{{ $errors->first('morning_reservation_starts_at') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="time">Horários de término do bloqueio da sala no período da manhã:</label>
            <input type="time"
                   id="time"
                   name="morning_reservation_ends_at"
                   placeholder="Informe o horário desejado"
                   value="{{ isset($room) ? $room->time : old('morning_reservation_ends_at') }}"
                   class="form-control @error('time')validation-error @enderror">
            @if($errors->has('morning_reservation_ends_at'))
                <span>{{ $errors->first('morning_reservation_ends_at') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="time">Horário de início do bloqueio da sala no período da tarde:</label>
            <input type="time"
                   id="time"
                   name="afternoon_reservation_starts_at"
                   placeholder="Informe o horário desejado"
                   value="{{ isset($room) ? $room->time : old('afternoon_reservation_starts_at') }}"
                   class="form-control @error('time')validation-error @enderror">
            @if($errors->has('afternoon_reservation_starts_at'))
                <span>{{ $errors->first('afternoon_reservation_starts_at') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="time">Horários de término do bloqueio da sala no período da tarde:</label>
            <input type="time"
                   id="time"
                   name="afternoon_reservation_ends_at"
                   placeholder="Informe o horário desejado"
                   value="{{ isset($room) ? $room->time : old('afternoon_reservation_ends_at') }}"
                   class="form-control @error('time')validation-error @enderror">
            @if($errors->has('afternoon_reservation_ends_at'))
                <span>{{ $errors->first('afternoon_reservation_ends_at') }}</span>
            @endif
        </div>
      <div>
        <label>Disponibilidade:</label>
      </div>
      <div>
        <input type="radio"
               id="disponivel" 
               name="available"
               value="true">
        <label for="disponivel">Disponível</label>
        @if($errors->has('available'))
                <span>{{ $errors->first('available') }}</span>
        @endif
      </div>
      <div>
        <input type="radio" 
               id="bloqueada" 
               name="available"
               value="false">
        <label for="bloqueada">Bloqueada</label>
        @if($errors->has('available'))
                <span>{{ $errors->first('available') }}</span>
        @endif
      </div>
      <div class="form-group">
          <button class="btn btn-success btn-block">
            @yield('buttonTitle')
          </button>
      </div>
    </div>
</div>
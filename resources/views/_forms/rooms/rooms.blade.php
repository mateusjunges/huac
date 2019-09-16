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
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="time">Horário de início do bloqueio da sala no período da manhã:</label>
            <input type="time"
                   id="time"
                   name="morning_reservation_starts_at"
                   placeholder="Informe o horário desejado"
                   value="{{ isset($room) ? $room->morning_reservation_starts_at : old('morning_reservation_starts_at') }}"
                   class="form-control @error('time')validation-error @enderror">
            @if($errors->has('morning_reservation_starts_at'))
                <span class="text-danger">{{ $errors->first('morning_reservation_starts_at') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="time">Horários de término do bloqueio da sala no período da manhã:</label>
            <input type="time"
                   id="time"
                   name="morning_reservation_ends_at"
                   placeholder="Informe o horário desejado"
                   value="{{ isset($room) ? $room->morning_reservation_ends_at : old('morning_reservation_ends_at') }}"
                   class="form-control @error('time')validation-error @enderror">
            @if($errors->has('morning_reservation_ends_at'))
                <span class="text-danger">{{ $errors->first('morning_reservation_ends_at') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="time">Horário de início do bloqueio da sala no período da tarde:</label>
            <input type="time"
                   id="time"
                   name="afternoon_reservation_starts_at"
                   placeholder="Informe o horário desejado"
                   value="{{ isset($room) ? $room->afternoon_reservation_starts_at : old('afternoon_reservation_starts_at') }}"
                   class="form-control @error('time')validation-error @enderror">
            @if($errors->has('afternoon_reservation_starts_at'))
                <span
                    class="text-danger">{{ $errors->first('afternoon_reservation_starts_at') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="time">Horários de término do bloqueio da sala no período da tarde:</label>
            <input type="time"
                   id="time"
                   name="afternoon_reservation_ends_at"
                   placeholder="Informe o horário desejado"
                   value="{{ isset($room) ? $room->afternoon_reservation_ends_at : old('afternoon_reservation_ends_at') }}"
                   class="form-control @error('time')validation-error @enderror">
            @if($errors->has('afternoon_reservation_ends_at'))
                <span class="text-danger">{{ $errors->first('afternoon_reservation_ends_at') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="color">Selecione uma cor para a sala:</label>
            <input type="color"
                   class="form-control"
                   name="color"
                   value="{{ isset($room) ? $room->color : old('color') }}">
            @if($errors->has('color'))
                <span class="text-danger">{{ $errors->first('color') }}</span>
            @endif
        </div>
      <div>
        <label>Disponibilidade:</label>
      </div>
      <div>
          <div class="form-group">
              <label for="available">Disponível</label>
              <input type="radio"
                     id="available"
                     @if(isset($room))
                         @if($room->available)
                            checked
                         @endif
                     @endif
                     name="available"
                     value="true">
              <br>
              <label for="bloqueada">Bloqueada</label>
              <input type="radio"
                     @if(isset($room))
                         @if(!$room->available)
                            checked
                         @endif
                     @endif
                     id="bloqueada"
                     name="available"
                     value="false">
              <br>
              @if($errors->has('available'))
                  <span class="text-danger">{{ $errors->first('available') }}</span>
              @endif
          </div>
      </div>
      <div>
      </div>
      <div class="form-group">
          <button class="btn btn-success btn-block">
            @yield('buttonTitle')
          </button>
      </div>
    </div>
</div>

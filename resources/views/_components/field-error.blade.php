@if($errors->has($field))
    <span class="text-danger">{{ $errors->first($field) }}</span>
@endif

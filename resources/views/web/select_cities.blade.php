
@foreach ($data as $option)
<option value="{{ $option->id }}">{{ $option->name }}</option>
@endforeach
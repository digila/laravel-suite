
@if($label != false)
<label for="{{ $name }}" class="{{ $attributes['colLabel'] or 'col-md-2' }} col-form-label">
    {{ $label }} @if($need) <span class="badge badge-danger">必須</span> @endif 
</label>
@endif


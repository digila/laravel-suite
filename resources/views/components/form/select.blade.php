
<?php
    $inputAttribs = [];
    $options = [];
    $class = 'form-control';
    if ($errors->has($name)) { $class .= ' form-control-danger'; }
    $inputAttribs['class'] = $class;
    if (!empty($attributes['placeholder'])) { $inputAttribs['placeholder'] = $attributes['placeholder']; }
    if (!empty($attributes['options'])) { $options = $attributes['options']; }
?>

<div class="form-group row {{ ($errors->has($name)) ? 'has-danger' : '' }}">
    <label for="{{ $name }}" class="{{ $attributes['colLabel'] or 'col-md-2' }} col-form-label"><i class="fa fa-pencil" aria-hidden="true"></i> {{ $label }} @if($need) <span class="badge badge-danger">必須</span> @endif </label>
    <div class="{{ $attributes['colInput'] or 'col-md-10' }}">
      {{ Form::select($name, $options, $value, $inputAttribs) }}
      @foreach ($errors->get($name) as $message)
      <div class="form-control-feedback">{{ $message }}</div>
      @endforeach
      @if(!empty($attributes['description']))
      <small class="form-text text-muted">{{ $attributes['description'] }}</small>
      @endif
    </div>
</div>

<?php
    $inputAttribs = [];
    $class = 'form-control';
    if ($errors->has($name)) { $class .= ' form-control-danger'; }
    $inputAttribs['class'] = $class;
    if (!empty($attributes['placeholder'])) { $inputAttribs['placeholder'] = $attributes['placeholder']; }
?>

<div class="form-group row {{ ($errors->has($name) || $errors->has($name . '_year') || $errors->has($name . '_mon') || $errors->has($name . '_day')) ? 'has-danger' : '' }}">
    <label for="{{ $name }}" class="{{ $attributes['colLabel'] or 'col-md-2' }} col-form-label"><i class="fa fa-pencil" aria-hidden="true"></i> {{ $label }} @if($need) <span class="badge badge-danger">必須</span> @endif </label>
    <div class="{{ $attributes['colInput'] or 'col-md-10' }}">
        <div class="row">
            <div class="input-group col-md-12">
                {{ Form::select($name, ['' => '---', 'A型' => 'A型', 'B型' => 'B型', 'O型' => 'O型', 'AB型' => 'AB型'], $value, $inputAttribs) }}
            </div>
        </div>
      @foreach ($errors->get($name) as $message)
      <div class="form-control-feedback">{{ $message }}</div>
      @endforeach
      @if(!empty($attributes['description']))
      <small class="form-text text-muted">{{ $attributes['description'] }}</small>
      @endif
    </div>
</div>
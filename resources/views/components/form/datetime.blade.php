
<?php
    $inputAttribs = [];
    $class = 'form-control';
    if ($errors->has($name)) { $class .= ' form-control-danger'; }
    $inputAttribs['class'] = $class;
    if (!empty($attributes['placeholder'])) { $inputAttribs['placeholder'] = $attributes['placeholder']; }
    
    $startYear = date('Y');
    if (!empty($attributes['startYear'])) {
        if (is_numeric($attributes['startYear'])) {
            $startYear = $attributes['startYear'];
        }
        unset($attributes['startYear']);
    }
    
    $endYear = 1950;
    if (!empty($attributes['endYear'])) {
        if (is_numeric($attributes['endYear'])) {
            $endYear = $attributes['endYear'];
        }
        unset($attributes['endYear']);
    }
?>

<div class="form-group row {{ ($errors->has($name) || $errors->has($name . '_year') || $errors->has($name . '_mon') || $errors->has($name . '_day') || $errors->has($name . '_hour') || $errors->has($name . '_min')) ? 'has-danger' : '' }}">
    <label for="{{ $name }}" class="{{ $attributes['colLabel'] or 'col-md-2' }} col-form-label"><i class="fa fa-pencil" aria-hidden="true"></i> {{ $label }} @if($need) <span class="badge badge-danger">必須</span> @endif </label>
    <div class="{{ $attributes['colInput'] or 'col-md-10' }}">
        <div class="row">
            <div class="input-group col-md-12">
                {{ Form::selectRange($name . '_year', $startYear, $endYear, $value, $inputAttribs) }}
                <div class="input-group-addon">年</div>
                {{ Form::selectRange($name . '_mon', 1, 12, $value, $inputAttribs) }}
                <div class="input-group-addon">月</div>
                {{ Form::selectRange($name . '_day', 1, 31, $value, $inputAttribs) }}
                <div class="input-group-addon">日</div>
                {{ Form::selectRange($name . '_hour', 0, 24, $value, $inputAttribs) }}
                <div class="input-group-addon">時</div>
                {{ Form::selectRange($name . '_min', 0, 59, $value, $inputAttribs) }}
                <div class="input-group-addon">分</div>
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
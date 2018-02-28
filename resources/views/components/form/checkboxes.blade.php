
<?php
    $inputAttribs = [];
    $options = [];
    $class = 'form-check-input';
    if ($errors->has($name)) { $class .= ' form-control-danger'; }
    $inputAttribs['class'] = $class;
    if (!empty($attributes['placeholder'])) { $inputAttribs['placeholder'] = $attributes['placeholder']; }
    if (!empty($attributes['options'])) { $options = $attributes['options']; }
?>

<div class="form-group row {{ ($errors->has($name)) ? 'has-danger' : '' }}">
    @include('digilasuite::components.form._label')
    <div class="{{ $attributes['colInput'] or 'col-md-10' }}">
        @foreach($options as $itemValue => $itemLavel)
        <?php $checked = ($itemValue == $value) ? true : null;  ?>
        <div class="form-check form-check-inline">
            {{ Form::checkbox($name . '[]', $itemValue, $checked, $inputAttribs) }}
            <label class="form-check-label">{{ $itemLavel }}</label>
        </div>
        @endforeach
      @foreach ($errors->get($name) as $message)
      <div class="form-control-feedback">{{ $message }}</div>
      @endforeach
      @if(!empty($attributes['description']))
      <small class="form-text text-muted">{{ $attributes['description'] }}</small>
      @endif
    </div>
</div>
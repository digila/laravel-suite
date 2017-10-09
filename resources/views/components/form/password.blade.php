
<?php
    $inputAttribs = [];
    $class = 'form-control';
    if ($errors->has($name)) { $class .= ' is-invalid'; }
    if ($need) { $class .= ' required'; }
    $inputAttribs['class'] = $class;
    if (!empty($attributes['placeholder'])) { $inputAttribs['placeholder'] = $attributes['placeholder']; }
?>

<div class="form-group row {{ ($errors->has($name)) ? 'has-danger' : '' }}">
    @include('digilasuite::components.form._label')
    <div class="{{ $attributes['colInput'] or 'col-md-10' }}">
      {{ Form::password($name, $inputAttribs) }}
      @include('digilasuite::components.form._message')
    </div>
</div>
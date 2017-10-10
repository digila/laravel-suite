
<?php
    $inputAttribs = [];
    $class = 'form-control';
    if ($errors->has($name)) { $class .= ' form-control-danger'; }
    $inputAttribs['class'] = $class;
    if (!empty($attributes['placeholder'])) { $inputAttribs['placeholder'] = $attributes['placeholder']; }
    
    $pref = config('pref');
    
    if (!empty($attributes['type'])) {
        if ($attributes['type'] === 'name:name') {
            $tmpPref = [];
            foreach ($pref as $n) {
                $tmpPref[$n] = $n;
            }
            $pref = $tmpPref;
        }
    }
?>

<div class="form-group row {{ ($errors->has($name) || $errors->has($name . '_year') || $errors->has($name . '_mon') || $errors->has($name . '_day')) ? 'has-danger' : '' }}">
    @include('digilasuite::components.form._label')
    <div class="{{ $attributes['colInput'] or 'col-md-10' }}">
        <div class="row">
            <div class="input-group col-md-12">
                {{ Form::select($name, ['' => '---'] + $pref, $value, $inputAttribs) }}
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
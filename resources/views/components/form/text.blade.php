
<?php
    $inputAttribs = [];
    $class = 'form-control';
    if ($errors->has($name)) { $class .= ' is-invalid'; }
    if ($need) { $class .= ' required'; }
    $inputAttribs['class'] = $class;
    if (!empty($attributes['placeholder'])) { $inputAttribs['placeholder'] = $attributes['placeholder']; }
?>

<div class="form-group row">
    @include('digilasuite::components.form._label')
    <div class="{{ $attributes['colInput'] or 'col-md-10' }}">
        @if(!empty($attributes['pre-addon']) || !empty($attributes['post-addon']))
        <div class="input-group">
        @endif
            @if(!empty($attributes['pre-addon']))
            <div class="input-group-addon">{{ $attributes['pre-addon'] }}</div>
            @endif
            {{ Form::text($name, $value, $inputAttribs) }}
            @if(!empty($attributes['post-addon']))
            <div class="input-group-addon">{{ $attributes['post-addon'] }}</div>
            @endif
        @if(!empty($attributes['pre-addon']) || !empty($attributes['post-addon']))
        </div>
        @endif
        @include('digilasuite::components.form._message')
    </div>
</div>

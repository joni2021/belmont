<label class="block my-2" for="{{ isset($attributes['id']) ? $attributes['id'] : $name }}">{{ $label }}</label>
<!-- image-preview-filename input [CUT FROM HERE]-->
<div class="input-group image-preview">
    <input type="text" class="form-control image-preview-filename" disabled="disabled">
    <!-- don't give a name === doesn't send on POST/GET -->
    <span class="input-group-btn">
        <!-- image-preview-clear button -->
        <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
            <span class="fa fa-trash"></span> Borrar
        </button>
<!-- image-preview-input -->
        <div class="btn btn-default image-preview-input">
            <span class="fa fa-folder-open"></span>
            <span class="image-preview-input-title">Buscar</span>
            {{ Form::file($name,$value, array_merge(['class' => 'form-control-file','id' => isset($attributes['id']) ? $attributes['id'] : $name],$attributes)) }}
        </div>
    </span>
</div><!-- /input-group image-preview [TO HERE]-->
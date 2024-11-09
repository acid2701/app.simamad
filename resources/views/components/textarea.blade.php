<div class="form-group mb-0">
    <label for="{{ $id }}">{{ $label }}</label>
    <textarea id="{{ $id }}" name="{{ $name }}" class="form-control" data-height="{{ $height ?? '150' }}"
        {{ $required ? 'required' : '' }} {{ $readonly ? 'readonly' : '' }}>{{ $value ?? '' }}</textarea>
</div>

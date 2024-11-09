<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="{{ $type ?? 'text' }}"
        class="form-control @error($name) is-invalid @enderror"
        name="{{ $name }}" id="{{ $name }}"
        value="{{ old($name) }}">
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

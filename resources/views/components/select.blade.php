<div class="form-group">
    <label class="form-label">{{ $label }}</label>
    <div class="selectgroup w-100">
        @foreach ($options as $value => $text)
            <label class="selectgroup-item">
                <input type="radio" name="{{ $name }}" value="{{ $value }}" class="selectgroup-input"
                    {{ old($name, $selected) == $value ? 'checked' : '' }}>
                <span class="selectgroup-button">{{ $text }}</span>
            </label>
        @endforeach
    </div>
    @error($name)
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

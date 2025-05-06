<div>
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="checkbox" name="{{ $name }}" id="{{ $name }}" {{ $value ? 'checked' : '' }}>
</div>

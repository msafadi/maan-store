@if ( isset($label) )
<label for="{{ $id ?? $name }}">{{ $label }}</label>
@endif
<div>
    <input type="text" id="{{ $id ?? $name }}" 
        name="{{ $name }}" value="{{ old($name, $value ?? null) }}"
        class="form-control @error($name) is-invalid @enderror">
    
    @error($name)
    <p class="invalid-feedback">{{ $message }}</p>
    @enderror
</div>
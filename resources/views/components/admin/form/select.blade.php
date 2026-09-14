@props(['label', 'name'])


<div class="col-md-6">
    <label class="form-label" for="{{ $name }}">{{ $label }}</label>
    <select class="form-select" id="{{ $name }}" name="{{ $name }}">
        <option selected disabled>Select {{ strtolower($label) }}</option>
        {{ $slot }}
    </select>
    <x-admin.error-message name="{{ $name }}" />
</div>

@props(['label', 'type' => 'text', 'name', 'value' => null, 'placeholder' => null])

<div class="col-md-6">
    <label class="form-label" for="{{ $name }}">{{ $label }}</label>
    <input type="{{ $type }}" class="form-control" id="{{ $name }}" placeholder="{{ $placeholder }}"
        name="{{ $name }}" value="{{ $value }}">
    <x-admin.error-message name="{{ $name }}" />
</div>

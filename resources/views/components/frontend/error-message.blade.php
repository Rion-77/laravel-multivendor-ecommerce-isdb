@props(['name'])

@error($name)
    <p class="text-danger small mt-1 mb-0" role="alert">{{ $message }}</p>
@enderror
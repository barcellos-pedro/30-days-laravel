@props(['name'])

@error($name)
<p class="text-sm text-red-500 font-bold mt-2">
    {{ $message }}
</p>
@enderror

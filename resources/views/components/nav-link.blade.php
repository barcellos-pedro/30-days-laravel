@props([
    'active' => false,
    'type' => 'anchor',
 ])

@if($type == 'anchor')
    <a class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium"
       aria-current="{{ $active ? 'true' : 'false' }}" {{ $attributes }}>
        {{ $slot }}
    </a>
@else
    <button
        class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium"
        aria-current="{{ $active ? 'true' : 'false' }}"
        onclick="window.location.href = '{{ $attributes['href'] }}'" {{ $attributes }}>
        {{ $slot }}
    </button>
@endif

@props(['superNinja' => false, 'highlight' => false, 'href2'])

<div @class([
    'highlight' => $highlight,
    'card',
    'super-ninja' => $superNinja,
])>
    {{ $slot }}
    <a href="{{ $attributes->get('href') }}" class="btn">View details</a>
    {{-- OR --}}
    <a {{ $attributes }} class="btn">View details 2</a>
    {{-- OR --}}
    <a href="/ninjas/{{ $href2 }}" class="btn">View details 3</a>
</div>

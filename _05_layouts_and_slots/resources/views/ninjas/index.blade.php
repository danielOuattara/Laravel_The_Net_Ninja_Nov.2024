<x-layout>
    <h2>Currently available Laravel Ninjas</h2>
    @if ($greetings === 'Hello great warriors')
        <p>Hi from inside the if statement</p>
    @endif
    <p>{{ $greetings }}</p>
    <p>Click in each warrior to see details</p>
    <ul>
        @foreach ($ninjas as $ninja)
            <li>
                <a href="/ninjas/{{ $ninja['id'] }}">{{ $ninja['name'] }}</a>
            </li>
        @endforeach
    </ul>
</x-layout>

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
                <x-card href="ninjas/{{ $ninja['id'] }}" :href2="$ninja['id']" :superNinja="true" :highlight="$ninja['skill'] > 70">
                    <h3>{{ $ninja['name'] }}</h3>
                </x-card>
            </li>
        @endforeach
    </ul>
</x-layout>

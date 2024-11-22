<x-layout>
    <h2>Currently available Laravel Ninjas</h2>

    <p>Click in each warrior to see details</p>

    <ul>
        @foreach ($ninjas as $ninja)
            <li>
                <x-card href="ninjas/{{ $ninja['id'] }}" :highlight="$ninja['skill'] > 70">
                    <h3>{{ $ninja['name'] }}</h3>
                </x-card>
            </li>
        @endforeach
    </ul>
</x-layout>

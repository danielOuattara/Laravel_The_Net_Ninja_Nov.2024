<x-layout>
    <h2>{{ $ninja->name }}'s Profile</h2>

    <div class="bg-gray-200 p-4 rounded">
        <p><strong>Level: </strong> {{ $ninja->skill }}</p>
        <p><strong>Weapon: </strong> {{ $ninja->weapon }}</p>
        <p><strong>About me: </strong></p>
        <p>{{ $ninja->bio }}</p>
    </div>

    {{-- Dojo info --}}
    <div class="border-2 border-dashed bg-white px-4 pb-4 rounded">
        <h3>Dojo Information</h3>
        <p><strong>Dojo name: </strong>{{ $ninja->dojo->name }}</p>
        <p><strong>Location: </strong>{{ $ninja->dojo->location }}</p>
        <p><strong>About the Dojo: </strong></p>
        <p>{{ $ninja->dojo->description }}</p>
    </div>
</x-layout>
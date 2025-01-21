<x-layout>
    <h2>Add a New warrior </h2>

    <form action="{{ route('ninjas.store') }}" method="POST">
        @csrf

        {{-- Ninja name --}}
        <label for="name">Name :</label>
        <input type="text" id="name" name="name" required>

        {{-- Ninja skill --}}
        <label for="skill">Skill (0 - 100) :</label>
        <input type="number" id="skill" name="skill" required>

        {{-- Ninja weapon --}}
        <label for="weapon">Weapon :</label>
        <select id="weapon" name="weapon" required>
            <option value="" selected>Select a weapon</option>
            @foreach ($weapons as $weapon)
                <option value="{{ $weapon }}">{{ $weapon }}</option>
            @endforeach
        </select>

        {{-- select a dojo  --}}
        <label for="dojo_id">Dojo :</label>
        <select id="dojo_id" name="dojo_id" required>
            <option value="" selected>Select a dojo</option>
            @foreach ($dojos as $dojo)
                <option value="{{ $dojo->id }}">{{ $dojo->name }}</option>
            @endforeach
        </select>

        {{-- ninja Bio --}}
        <label for="bio">Biography :</label>
        <textarea rows="5" id="bio" name="bio" required></textarea>

        {{-- validation errors --}}

        <button type="submit" class="btn mt-4">Create Ninja</button>


    </form>
</x-layout>

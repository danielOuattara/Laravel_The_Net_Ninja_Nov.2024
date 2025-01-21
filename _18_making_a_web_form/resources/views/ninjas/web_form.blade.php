<form action="" method="">
    <h2>Add a New warrior </h2>

    {{-- Ninja name --}}
    <label for="name">Name :</label>
    <input type="text" id="name" name="name" required>

    {{-- Ninja skill --}}
    <label for="skill">Skill (0 - 100) :</label>
    <input type="number" id="skill" name="skill" required>

    {{-- Ninja weapon --}}
    <label for="weapon">Weapon :</label>
    <input type="text" id="name" name="name" required>

    {{-- ninja Bio --}}
    <label for="bio">Biography:</label>
    <textarea rows="5" id="bio" name="bio" required></textarea>
</form>


<form action="" method="">

    <!-- ninja Name -->
    <label for="name">Ninja Name:</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}" required>

    <!-- ninja Strength -->
    <label for="skill">Ninja Skill (0-100):</label>
    <input type="number" id="skill" name="skill" required>

    <!-- ninja Bio -->
    <label for="bio">Biography:</label>
    <textarea rows="5" id="bio" name="bio" required></textarea>
</form>

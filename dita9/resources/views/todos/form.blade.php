<label for="title">Titulli</label>
<input id="title" type="text" name="title" value="{{ old('title', $todo->title ?? '') }}" maxlength="150" required>
<label for="description">Përshkrimi</label>
<textarea id="description" name="description" maxlength="10000">{{ old('description', $todo->description ?? '') }}</textarea>
<input type="hidden" name="completed" value="0">
<label for="completed">
    <input id="completed" type="checkbox" name="completed" value="1" @checked(old('completed', $todo->completed ?? false))>
    E përfunduar
</label>
<div class="actions">
    <button type="submit">{{ $submitLabel }}</button>
    <a href="{{ route('todos.index') }}">Anulo</a>
</div>

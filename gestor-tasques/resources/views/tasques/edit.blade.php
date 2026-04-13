@extends('layouts.app')

@section('content')
    <h1>Editar tasca</h1>

    <form action="{{ route('tasques.update', $tasca) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">Títol</label>
        <input type="text" name="title" id="title" value="{{ old('title', $tasca->title) }}">
        @error('title')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="description">Descripció</label>
        <textarea name="description" id="description">{{ old('description', $tasca->description) }}</textarea>
        @error('description')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="categoria_id">Categoria</label>
        <select name="categoria_id" id="categoria_id">
            <option value="">-- Sense categoria --</option>
            @foreach($categories as $categoria)
                <option value="{{ $categoria->id }}" {{ old('categoria_id', $tasca->categoria_id) == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->name }}
                </option>
            @endforeach
        </select>
        @error('categoria_id')
            <div class="error">{{ $message }}</div>
        @enderror

        <label>
            <input type="checkbox" name="completed" value="1" {{ old('completed', $tasca->completed) ? 'checked' : '' }}>
            Completada
        </label>

        <br><br>

        <button type="submit">Actualitzar</button>
    </form>
@endsection
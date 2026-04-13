@extends('layouts.app')

@section('content')
    <h1>Crear tasca</h1>

    <form action="{{ route('tasques.store') }}" method="POST">
        @csrf

        <label for="title">Títol</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}">
        @error('title')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="description">Descripció</label>
        <textarea name="description" id="description">{{ old('description') }}</textarea>
        @error('description')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="categoria_id">Categoria</label>
        <select name="categoria_id" id="categoria_id">
            <option value="">-- Sense categoria --</option>
            @foreach($categories as $categoria)
                <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->name }}
                </option>
            @endforeach
        </select>
        @error('categoria_id')
            <div class="error">{{ $message }}</div>
        @enderror

        <label>
            <input type="checkbox" name="completed" value="1" {{ old('completed') ? 'checked' : '' }}>
            Completada
        </label>

        <br><br>

        <button type="submit">Guardar</button>
    </form>
@endsection
@extends('layouts.app')

@section('content')
    <h1>Editar categoria</h1>

    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nom</label>
        <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}">
        @error('name')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit">Actualitzar</button>
    </form>
@endsection
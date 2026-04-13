@extends('layouts.app')

@section('content')
    <h1>Crear categoria</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <label for="name">Nom</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        @error('name')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit">Guardar</button>
    </form>
@endsection
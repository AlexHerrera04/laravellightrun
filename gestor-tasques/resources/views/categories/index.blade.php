@extends('layouts.app')

@section('content')
    <h1>Llistat de categories</h1>

    <a href="{{ route('categories.create') }}">
        <button>Nova categoria</button>
    </a>

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Nombre de tasques</th>
                <th>Accions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->tasques_count }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category) }}">
                            <button class="btn-warning">Editar</button>
                        </a>

                        <form class="inline-form" action="{{ route('categories.destroy', $category) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
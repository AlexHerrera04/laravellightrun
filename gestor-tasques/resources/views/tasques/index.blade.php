@extends('layouts.app')

@section('content')
    <h1>Llistat de tasques</h1>

    <a href="{{ route('tasques.create') }}">
        <button>Nova tasca</button>
    </a>

    <table>
        <thead>
            <tr>
                <th>Títol</th>
                <th>Descripció</th>
                <th>Completada</th>
                <th>Categoria</th>
                <th>Accions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasques as $tasca)
                <tr>
                    <td>{{ $tasca->title }}</td>
                    <td>{{ $tasca->description }}</td>
                    <td>{{ $tasca->completed ? 'Sí' : 'No' }}</td>
                    <td>{{ $tasca->categoria->name ?? 'Sense categoria' }}</td>
                    <td>
                        <a href="{{ route('tasques.edit', $tasca) }}">
                            <button class="btn-warning">Editar</button>
                        </a>

                        <form class="inline-form" action="{{ route('tasques.destroy', $tasca) }}" method="POST">
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
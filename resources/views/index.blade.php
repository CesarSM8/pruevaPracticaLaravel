<!DOCTYPE html>
<html>
<head>
    <title>Lista de Vecinos</title>
</head>
<body>
    <h1>Lista de Vecinos</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <ul>
        @foreach ($vecino as $index => $vecino)
            <li>
                {{ $vecino['nombre'] }} - 
                @if ($vecino['realizado'])
                    <span>Realizado</span>
                @else
                    <form action="{{ route('vecino.complete', $index) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit">Marcar como Realizado</button>
                    </form>
                @endif
                <form action="{{ route('vecino.destroy', $index) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('vecino.create') }}">Crear Nuevo vecino</a>
</body>
</html>

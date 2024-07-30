<!DOCTYPE html>
<html>
<head>
    <title>Alta vecino</title>
</head>
<body>
    <h1>Nuevo Vecino</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('vecino.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre del Vecino:</label>
        <input type="text" id="nombre" name="nombre">
        <label for="escalera">Escalera:</label>
        <input type="text" id="escalera" name="escalera">
        <label for="piso">Piso:</label>
        <input type="text" id="piso" name="piso">
        <label for="puerta">Puerta:</label>
        <input type="text" id="puerta" name="puerta">
        <button type="submit">Guardar</button>
    </form>
    

    <a href="{{ route('vecino.index') }}">Volver a la Lista de Vecinos</a>
</body>
</html>

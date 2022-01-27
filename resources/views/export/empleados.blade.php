<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Teléfono</th>
            <th>Correo electrónico</th>
            <th>Estatus</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($empleados as $empleado)

        <tr>
            <td>{{ $empleado->id }}</td>
            <td>{{ $empleado->name }}</td>
            <td>{{ $empleado->apellidos}}</td>
            <td>{{ $empleado->telefono }}</td>
            <td>{{ $empleado->email }}</td>
            <td>{{ $empleado->status }}</td>
        </tr>
        @endforeach

    </tbody>
</table>
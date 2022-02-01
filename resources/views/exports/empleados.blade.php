<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
           
        </tr>
    </thead>
    <tbody>
        @foreach ($empleados as $empleado)
            <tr>
                <td>{{ $empleado->id }}</td>
                <td>{{ $empleado->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

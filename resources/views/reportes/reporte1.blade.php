<table>
    <tr>
        <td>Id</td>
        <td>Telefono</td>
        <td>Mensaje</td>
               
        

    </tr>
    @foreach($report as $value )
        <tr>
            <td>{{ $value->id}}</td>
            <td>{{ $value->phone}}</td>
            <td>{{ $value->message }}</td>
            
        </tr>
    @endforeach
</table>

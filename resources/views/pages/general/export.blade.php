<table>
    <thead>
        <tr>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
    @foreach($generals as $general)
        <tr>
            <td>{{ $general->name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

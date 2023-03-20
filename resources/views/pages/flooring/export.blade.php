<table>
    <thead>
        <tr>
            <th>Floor</th>
        </tr>
    </thead>
    <tbody>
    @foreach($flooring as $val)
        <tr>
            <td>{{ $val->floor }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

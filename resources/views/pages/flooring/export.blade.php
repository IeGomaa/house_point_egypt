<table>
    <thead>
        <tr>
            <th>Floor</th>
        </tr>
    </thead>
    <tbody>
    @foreach($floorings as $flooring)
        <tr>
            <td>{{ $flooring->floor }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<table>
    <thead>
        <tr>
            <th>Number</th>
        </tr>
    </thead>
    <tbody>
    @foreach($floors as $floor)
        <tr>
            <td>{{ $floor->number }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

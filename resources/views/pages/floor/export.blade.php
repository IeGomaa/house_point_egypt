<table>
    <thead>
        <tr>
            <th>Number En</th>
            <th>Number Ar</th>
        </tr>
    </thead>
    <tbody>
    @foreach($floors as $floor)
        <tr>
            <td>{{ $floor->getTranslation('number', 'en') }}</td>
            <td>{{ $floor->getTranslation('number', 'ar') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

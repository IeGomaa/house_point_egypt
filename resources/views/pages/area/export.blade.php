<table>
    <thead>
        <tr>
            <th>Area En</th>
            <th>Area Ar</th>
        </tr>
    </thead>
    <tbody>
    @foreach($areas as $area)
        <tr>
            <td>{{ $area->getTranslation('name', 'en') }}</td>
            <td>{{ $area->getTranslation('name', 'ar') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

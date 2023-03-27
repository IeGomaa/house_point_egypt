<table>
    <thead>
        <tr>
            <th>Property</th>
            <th>General</th>
        </tr>
    </thead>
    <tbody>
    @foreach($propertyGenerals as $propertyGeneral)
        <tr>
            <td>{{ $propertyGeneral->property->getTranslation('title', 'en') }}</td>
            <td>{{ $propertyGeneral->general->name }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

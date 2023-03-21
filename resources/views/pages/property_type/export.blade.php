<table>
    <thead>
        <tr>
            <th>Type En</th>
            <th>Type Ar</th>
        </tr>
    </thead>
    <tbody>
    @foreach($property_types as $property_type)
        <tr>
            <td>{{ $property_type->getTranslation('type', 'en') }}</td>
            <td>{{ $property_type->getTranslation('type', 'ar') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

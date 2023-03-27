<table>
    <thead>
        <tr>
            <th>Property</th>
            <th>Flooring</th>
        </tr>
    </thead>
    <tbody>
    @foreach($propertyFlooring as $val)
        <tr>
            <td>{{ $val->property->getTranslation('title', 'en') }}</td>
            <td>{{ $val->flooring->getTranslation('floor', 'en') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

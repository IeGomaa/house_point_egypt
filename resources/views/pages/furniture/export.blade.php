<table>
    <thead>
        <tr>
            <th>Furniture En</th>
            <th>Furniture Ar</th>
        </tr>
    </thead>
    <tbody>
    @foreach($furniture as $val)
        <tr>
            <td>{{ $val->getTranslation('furniture', 'en') }}</td>
            <td>{{ $val->getTranslation('furniture', 'ar') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

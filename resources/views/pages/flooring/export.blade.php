<table>
    <thead>
        <tr>
            <th>Floor En</th>
            <th>Floor Ar</th>
        </tr>
    </thead>
    <tbody>
    @foreach($flooring as $val)
        <tr>
            <td>{{ $val->getTranslation('floor', 'en') }}</td>
            <td>{{ $val->getTranslation('floor', 'ar') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

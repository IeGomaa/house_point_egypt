<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Iso</th>
            <th>Country Code</th>
            <th>Phone Code</th>
        </tr>
    </thead>
    <tbody>
    @foreach($countries as $country)
        <tr>
            <td>{{ $country->name }}</td>
            <td>{{ $country->iso }}</td>
            <td>{{ $country->country_code }}</td>
            <td>{{ $country->phone_code }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

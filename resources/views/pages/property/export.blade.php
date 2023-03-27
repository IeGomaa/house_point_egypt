<table>
    <thead>
        <tr>
            <th>Property</th>
            <th>Price</th>
            <th>Tag En</th>
            <th>Tag Ar</th>
            <th>Surface Area</th>
            <th>Title En</th>
            <th>Title Ar</th>
            <th>Status</th>
            <th>Number Of Rooms</th>
            <th>Number Of Bathrooms</th>
            <th>Description</th>
            <th>Date</th>
            <th>Type</th>
            <th>Owner Name</th>
            <th>Owner Phone</th>
            <th>Owner Address</th>
            <th>Video</th>
            <th>Rate</th>
            <th>Rate Number</th>
            <th>Views</th>
            <th>user id</th>
            <th>area id</th>
            <th>sub area id</th>
            <th>floor id</th>
            <th>furniture id</th>
            <th>property Type id</th>
        </tr>
    </thead>
    <tbody>
    @foreach($properties as $property)
        <tr>
            <td>{{ $property->property }}</td>
            <td>{{ $property->price }}</td>
            <td>{{ $property->getTranslation('tag', 'en') }}</td>
            <td>{{ $property->getTranslation('tag', 'ar') }}</td>
            <td>{{ $property->surface_area }}</td>
            <td>{{ $property->getTranslation('title', 'en') }}</td>
            <td>{{ $property->getTranslation('title', 'ar') }}</td>
            <td>{{ $property->status }}</td>
            <td>{{ $property->number_of_rooms }}</td>
            <td>{{ $property->number_of_bathrooms }}</td>
            <td>{{ $property->description }}</td>
            <td>{{ $property->date }}</td>
            <td>{{ $property->type }}</td>
            <td>{{ $property->owner_name }}</td>
            <td>{{ $property->owner_phone }}</td>
            <td>{{ $property->owner_address }}</td>
            <td>{{ $property->video }}</td>
            <td>{{ $property->rate }}</td>
            <td>{{ $property->rate_number }}</td>
            <td>{{ $property->views }}</td>
            <td>{{ $property->user_id }}</td>
            <td>{{ $property->area_id }}</td>
            <td>{{ $property->sub_area_id }}</td>
            <td>{{ $property->floor_id }}</td>
            <td>{{ $property->furniture_id }}</td>
            <td>{{ $property->property_type_id }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<table>
    <thead>
        <tr>
            <th>Property</th>
            <th>Summary</th>
        </tr>
    </thead>
    <tbody>
    @foreach($propertySummaries as $propertySummary)
        <tr>
            <td>{{ $propertySummary->property->getTranslation('title', 'en') }}</td>
            <td>{{ $propertySummary->summary->getTranslation('summary', 'en') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

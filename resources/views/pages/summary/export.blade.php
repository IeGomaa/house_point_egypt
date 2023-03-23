<table>
    <thead>
        <tr>
            <th>Summary En</th>
            <th>Summary Ar</th>
        </tr>
    </thead>
    <tbody>
    @foreach($summaries as $summary)
        <tr>
            <td>{{ $summary->getTranslation('summary', 'en') }}</td>
            <td>{{ $summary->getTranslation('summary', 'ar') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

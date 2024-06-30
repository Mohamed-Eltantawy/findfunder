<!DOCTYPE html>
<html>
<head>
    <title>Company Details</title>
</head>
<body>
    <h1>{{ $company->name }}</h1>
    <p>Number of Investors: {{ $company->investments->count() }}</p>
    <p>Minimum Investment: ${{ $minInvestment }}</p>
    <p>Total Raised: ${{ $totalRaised }}</p>

    <h2>Investors</h2>
    <table>
        <thead>
            <tr>
                <th>Investor Name</th>
                <th>Investment Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($company->investments as $investment)
            <tr>
                <td>{{ $investment->investor->name }}</td>
                <td>${{ $investment->amount }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

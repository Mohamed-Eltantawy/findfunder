<!DOCTYPE html>
<html>
<head>
    <title>Startup Dashboard</title>
</head>
<body>
    <h1>Startup Dashboard</h1>
    @if (isset($company))
        <h2>{{ $company->name }}</h2>
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
    @else
        <p>{{ $message }}</p>
    @endif
</body>
</html>

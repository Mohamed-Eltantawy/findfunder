<!DOCTYPE html>
<html>
<head>
    <title>Investor Dashboard</title>
</head>
<body>
    <h1>Investor Dashboard</h1>
    <table>
        <thead>
            <tr>
                <th>Company Name</th>
                <th>Number of Investors</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
            <tr>
                <td>{{ $company->name }}</td>
                <td>{{ $company->investments_count }}</td>
                <td><a href="{{ route('investor.company.show', $company->id) }}">View Details</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

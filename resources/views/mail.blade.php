<!DOCTYPE html>
<html>
<head>
    <title>Congratulations!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .logo {
            text-align: center;
            margin: 20px 0;
        }
        .logo img {
            max-width: 150px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Congratulations!</h1>
        <p>Dear {{ $userName }},</p>
        <p>We are pleased to inform you that your application has been successfully processed. Below are some details and records associated with your account:</p>

        <!-- Display user records in a table -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    {{-- <th>Phone</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Zip Code</th>
                    <th>Registration Date</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($record as $row)
                    <tr>
                        <td>{{ $row['first'] }}</td>
                        <td>{{ $row['last']}}</td>
                        <td>{{ $row['city'] }}</td>
                        <td>{{ $phone_number }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <h3>Selected Options:</h3>
        <ul>
            @foreach ($check_box as $value)
                <li>{{ ucfirst(str_replace('_', ' ', $value)) }}</li>
            @endforeach
        </ul>

        <!-- Display the logo -->
        <div class="logo">
            {{-- <img  src="{{ $message->embed(public_path('assets/tax_logo.png')) }}" alt="Company Logo"> --}}
        </div>
    </div>
</body>
</html>

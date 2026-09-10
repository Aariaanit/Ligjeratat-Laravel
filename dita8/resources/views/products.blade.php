<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <style>
        body {
            margin: 0;
            min-height: 100vh;
            background: #f4f7fb;
            color: #1f2937;
            font-family: Arial, Helvetica, sans-serif;
        }

        .page {
            width: min(100% - 32px, 1000px);
            margin: 0 auto;
            padding: 48px 0;
        }

        h1 {
            margin: 0 0 24px;
            font-size: 32px;
            color: #111827;
        }

        .table-wrapper {
            overflow-x: auto;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            box-shadow: 0 12px 32px rgba(15, 23, 42, 0.08);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 14px 16px;
            border-bottom: 1px solid #e5e7eb;
            text-align: left;
            white-space: nowrap;
        }

        th {
            background: #111827;
            color: #ffffff;
            font-size: 13px;
            letter-spacing: 0;
            text-transform: uppercase;
        }

        tr:nth-child(even) td {
            background: #f9fafb;
        }
    </style>
</head>
<body>
    <main class="page">
        <h1>Products</h1>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Category</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($collection as $item)
                    <tr>
                        <td>{{ $item['id'] }}</td>
                        <td>{{ $item['title'] }}</td>
                        <td>{{ $item['price'] }}</td>
                        <td>{{ $item['description'] }}</td>
                        <td>{{ $item['category'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
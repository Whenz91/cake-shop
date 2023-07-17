<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body { 
            font-family: DejaVu Sans, sans-serif; 
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        table {
            border-collapse: collapse;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $title }}</h1>
        <table>
            <tbody>
                <tr>
                    <td>Cake Shop</td>
                    <td>{{ $order->name }}</td>
                </tr>
                <tr>
                    <td>HU 1021 Budapest, Hűvösvölgyi út 136</td>
                    <td>HU {{ $order->zipcode }} {{ $order->city }}, {{ $order->address }}</td>
                </tr>
                <tr>
                    <td>12345678-2-12</td>
                    <td></td>
                </tr>
                <tr>
                    <td>info@cake-shop.hu</td>
                    <td>{{ $order->email }}</td>
                </tr>
                <tr>
                    <td>06-30-123-4545</td>
                    <td>{{ $order->phone }}</td>
                </tr>
            </tbody>
        </table>

        <hr>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $order->cake->name }}</td>
                    <td>{{ $order->cake->price }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
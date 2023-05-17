<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
    <style>
        /* Add the following CSS code to your existing styles or create a new CSS file */

        /* Set general styles for the table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        /* Set styles for table header */
        thead th {
            background-color: #f2f2f2;
            border: 1px solid #dddddd;
            padding: 8px;
            font-weight: bold;
        }

        /* Set styles for table body */
        tbody td {
            border: 1px solid #dddddd;
            padding: 8px;
        }

        /* Set alternating row colors for better readability */
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Set hover effect on table rows */
        tbody tr:hover {
            background-color: #eaf6ff;
        }

        /* Set styles for the first column */
        td.col-1 {
            width: 30px;
        }

        /* Add some spacing around the table */
        .card-body {
            margin: 20px;
        }

    </style>

</head>
<body>

<div class="page-break container"></div>

<div class="card-body">
    <h2 align="center"> {{ $from_date }} dan {{ $to_date }} gacha bo'lgan Operatsiyalarning hisoboti   </h2>

    <table class="table table-bordered text-center">
        <thead>
        <tr>
            <th class="" scope="col">T/R</th>
            <th class="" scope="col"> Nomi</th>
            <th class="" scope="col"> Kimdan</th>
            <th class="" scope="col"> Xonadan</th>
            <th class="" scope="col"> Mahsulot</th>
            <th class="" scope="col"> Kimga</th>
            <th class="" scope="col"> Xonaga</th>
            <th class="" scope="col"> Vaqti</th>

        </tr>
        </thead>
        <tbody>

        @foreach($histories as $ind=>$history)
            <tr>
                {{--                <td class="col-1">{{($histories->currentpage()-1)*($histories->perpage())+$ind+1}}</td>--}}
                <td class="col-1">{{ $ind+1 }}</td>

                <td>{{ $history->name  }}</td>

                <td>{{ $history->fromRoom->user->name }}</td>

                <td>{{ $history->fromRoom->name }}</td>


                <td>{{ $history->product->name }}</td>


                <td>{{ $history->toRoom->user->name }}</td>

                <td>{{ $history->toRoom->name }}</td>


                <td>{{ $history->created_at }}</td>

            </tr>
        @endforeach

        </tbody>

    </table>


</div>

</body>
</html>

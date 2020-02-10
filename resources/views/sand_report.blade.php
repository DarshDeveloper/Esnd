<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>

        .text-center{
            text-align:center!important
        }

        .pt-4{
            padding-top:1.5rem!important
        }
        .mt-4{
            margin-top:1.5rem!important
        }
        .wrapper{
            width: 100%;
            padding: 20px;
        }
        .rounded{
            border-radius:.25rem!important
        }
        body{
            background-color: #9d9d9d;
        }
    </style>
</head>
<body>

<a href="{{url('sand/report/pdf')}}"> Download Pdf </a>
<div class="container pt-4 mt-4 wrapper rounded ">
<table>
        <h2 class="text-center">My Picked Requests</h2>

        <hr>

        <thead>
<tr>
            <th>Request Description</th>
            <th>Category</th>
            <th>Masnod Status</th>
            <th>Delivery Date</th>
</tr>
        </thead>
        <tbody>

        @if(isset($srequests))
            @foreach($srequests as $request)
                <tr>
                    <td>
                        {{$request->request_description}}
                    </td>
                    <td>
                        {{$request->category}}
                    </td>
                    <td>
                        {{$request->masnod_status}}
                    </td>
                    <td>
                        {{$request->delivery_date}}
                    </td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
    <hr>

</div>
</body>

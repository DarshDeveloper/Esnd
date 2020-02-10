<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
@extends('admin.layout')
@section('content')
    <div class="sub_container">
        <label> Masnods List </label>
        <table class="table table-bordered">
            <thead>
            <tr>

                <th>Name</th>
                <th>email</th>
                <th>paid</th>
                <th>unpaid</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sands as $sand)
            <?php
            $req =  \App\Masnod_request::where('sand_id',$sand->id)->get();
            $payment = \App\Payment::whereIn('request',$req->pluck('id'))->get();
            ?>
            <tr>
            <td>{!! $sand->name !!}</td>
            <td>{!! $sand->email !!}</td>
            <td><?php echo $req->sum('value')+$payment->sum('total_money')+$sand->pocket; ?></td>
            <td>@if($sand->pocket < 0) {!! -$sand->pocket !!}@else {!! 0 !!}@endif</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

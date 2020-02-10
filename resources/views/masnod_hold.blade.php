<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
@extends('admin.layout')
@section('content')
    <div class="sub_container">
        <label> Masnod Verification Hold </label>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Social ID</th>
                <th>Name</th>
                <th>Governorate</th>
                <th>Address</th>
                <th>Social ID Front</th>
                <th>Social ID Back</th>
                <th>Telephone</th>
                <th>Email</th>
                <th colspan="3">View Message</th>
            </tr>
            </thead>
            <tbody>
            @foreach($m_hold_all as $m_hold)
                <?php
                $m_hold = App\Masnod::find($m_hold->hold);
                ?>
                @if($m_hold->valid == 0)
                    <tr>
                        <td>{!! $m_hold->social_id !!}</td>
                        <td>{!! $m_hold->name !!}</td>
                        <td>{!! $m_hold->governorate !!}</td>
                        <td>{!! $m_hold->address !!}</td>
                        <td><img src="//esndco.com/public/attachments/{!! $m_hold->social_id_front_photo !!}" style="width:100px;height:100px"> </td>
                        <td><img src="//esndco.com/public/attachments/{!! $m_hold->social_id_back_photo !!}" style="width:100px;height:100px"></td>
                        <td>{!! $m_hold->telephone !!}</td>
                        <td>{!! $m_hold->email !!}</td>
                        <td>
                            {!! Form::open() !!}
                            <div class='btn-group'>
                                <a href="{!! url('/masnod_hold_message/'.$m_hold->id)!!}" class='btn btn-primary btn-xs'><i class="fas fa-edit"></i></a>
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

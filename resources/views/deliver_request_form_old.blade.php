@extends('layouts.app')

@section('content')
@if($errors->any())
  @foreach($errors->all() as $error)
  {{$error}}
  @endforeach
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Masnod</div>
                <div class="card-body">
                  <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                      <div class="col-md-6">
                          <input id="name" type="text" class="form-control " readonly="readonly" name="email" value="{{$masnod->name}}" >
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>
                      <div class="col-md-6">
                          <input id="email" type="text" class="form-control " readonly="readonly" name="email" value="{{$masnod->email}}" >
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                      <div class="col-md-6">
                          <input id="address" type="text" class="form-control " readonly="readonly" name="address" value="{{$masnod->address}}" >
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="social_id" class="col-md-4 col-form-label text-md-right">Social Id</label>
                      <div class="col-md-6">
                          <input id="social_id" type="text" class="form-control " readonly="readonly" name="social_id" value="{{$masnod->social_id}}">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="governorate" class="col-md-4 col-form-label text-md-right">governorate</label>
                      <div class="col-md-6">
                          <input id="governorate" type="text" class="form-control " readonly="readonly" name="governorate" value="{{$masnod->governorate}}">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="telephone" class="col-md-4 col-form-label text-md-right">Telephone</label>
                      <div class="col-md-6">
                          <input id="telephone" type="text" class="form-control " readonly="readonly" name="telephone" value="{{$masnod->telephone}}">
                      </div>
                  </div>
                  <div class="col-md-12  ">
                    @foreach($messages as $masnod_message)
                      {{$masnod_message->message}} - {{$masnod_message->name}} -  {{$masnod_message->created_at}} <br />
                    @endforeach
                  </div>

              <div class="col-lg-10">
                {!! Form::open(['action'=>['VmasnodController@r_message','id'=>$request->id],'method'=>'post']) !!}
                <!-- <form action="VmasnodController@message" method="post"> -->
                  <div class="form-group">
                    <label>leave a message</label>
                    <input type="hidden" class="form-control" name="method" id="method">
                    <input type="text" class="form-control" name="message" required>
                  </div>
                  <button class="btn btn-primary" onclick="hold()">HOLD</button>
                  <button class="btn btn-primary" onclick="escalate()">ESCALATE</button>
                </form>
              </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Masnod Request</div>
                  @if($request->vmasnod_2)
                    <form action='/vmasnod/vmasnod_delivered?id={{$request->id}}' method="POST" enctype="multipart/form-data">
                  @else
                    <form action='/vmasnod/vmasnod2_take_request?id={{$request->id}}' method="POST">
                  @endif
                  <div class="card-body">
                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                        <div class="col-md-6">
                            <input id="description" type="text" class="form-control " readonly name="description"  value="{{$request->request_description}}">
                        </div>@csrf
                    </div>
                    <div class="form-group row">
                        <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>
                        <div class="col-md-6">
                            <input id="category" type="text" class="form-control "  readonly name="category"    value="{{$request->category}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="masnod_status" class="col-md-4 col-form-label text-md-right">Masnod Status</label>
                        <div class="col-md-6">
                            <input id="masnod_status" type="text" class="form-control " readonly name="masnod_status"  value="{{$request->masnod_status}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="masnod_status" class="col-md-4 col-form-label text-md-right">Masnod Status</label>
                        <div class="col-md-6">
                            <input id="masnod_status" type="text" class="form-control " readonly name="masnod_status"  value="{{$request->masnod_status}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="category" class="col-md-4 col-form-label text-md-right">Delivery Date</label>
                        <div class="col-md-6">
                          @if($request->vmasnod_2)
                            <input id="category" type="date" class="form-control " readonly  name="d_date"    value="{{$request->delivery_date}}">
                          @else
                            <input id="category" type="date" class="form-control "   name="d_date"    value="{{$request->delivery_date}}">
                          @endif
                        </div>

                        @if($request->vmasnod_2)
                        <div class="form-group row">
                          <label for="attachment" class="col-md-4 col-form-label text-md-right">attachment</label>
                          <div class="col-md-5 col-sm-5 col-xs-2" for="attachment">
                              <input id="attachment" type="file" class="form-control " name="attachment">
                          </div>
                        </div>
                        @endif
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                          @if($request->vmasnod_2)
                            @if(App\Payment::where('sand',$request->sand_id)->where('request',$request->id)->first()->in_charge==1 && $request->category != 'monetary')
                              <div class="form-group row">
                                <label for="cost" class="col-md-5 col-form-label text-md-right">Transportation Cost</label>
                                <div class="col-md-5 col-sm-5 col-xs-2" for="cost">
                                    <input id="cost" type="number" class="form-control " name="cost">
                                </div>
                              </div>
                              @endif

                            <button type="submit" class="btn btn-danger">delivered</button>
                          @else
                            <button type="submit" class="btn btn-danger">Take this request</button>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">

                            <img class='image-fluid' src= "//esndco.com/public/attachments/{{$request->attachments}}" />

                        </div>
                    </div>
                  </div>
                </form>
            </div>
        </div>
    </div>

</div>


@endsection

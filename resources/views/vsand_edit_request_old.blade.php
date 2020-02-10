@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sand</div>
                <div class="card-body">
                  <div class="form-group row">
                      <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                      <div class="col-md-6">
                          <input id="name" type="text" class="form-control " readonly="readonly" name="email" value="{{$sand->name}}" >
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>
                      <div class="col-md-6">
                          <input id="email" type="text" class="form-control " readonly="readonly" name="email" value="{{$sand->email}}" >
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                      <div class="col-md-6">
                          <input id="address" type="text" class="form-control " readonly="readonly" name="address" value="{{$sand->address}}" >
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="social_id" class="col-md-4 col-form-label text-md-right">Social Id</label>
                      <div class="col-md-6">
                          <input id="social_id" type="text" class="form-control " readonly="readonly" name="social_id" value="{{$sand->social_id}}">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="governorate" class="col-md-4 col-form-label text-md-right">governorate</label>
                      <div class="col-md-6">
                          <input id="governorate" type="text" class="form-control " readonly="readonly" name="governorate" value="{{$sand->governorate}}">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label for="telephone" class="col-md-4 col-form-label text-md-right">Telephone</label>
                      <div class="col-md-6">
                          <input id="telephone" type="text" class="form-control " readonly="readonly" name="telephone" value="{{$sand->telephone}}">
                      </div>
                  </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Masnod Request</div>
                <form action='/vsand/vsand_take_request?id={{$request->id}}' method="POST">@csrf
                  <div class="card-body">
                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                        <div class="col-md-6">
                            <input id="description" type="text" class="form-control " name="description" readonly  value="{{$request->request_description}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>
                        <div class="col-md-6">
                            <input id="category" type="text" class="form-control "  name="category"   readonly   value="{{$request->category}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="masnod_status" class="col-md-4 col-form-label text-md-right">Masnod Status</label>
                        <div class="col-md-6">
                            <input id="masnod_status" type="text" class="form-control " name="masnod_status"  readonly  value="{{$request->masnod_status}}">
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

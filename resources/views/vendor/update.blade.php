@extends('layouts.app')

@section('style')

@endsection

@section('content')

  
  <div class="container pt-5 pb-5">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        
        <div class="main_title">
          <h2><span>My Profile</span></h2>
        </div>

        <!-- VENDOR FORM -->
        <form method="POST" action="/vendor/{{$vendor->vendor_id}}/edit">
          {{ csrf_field() }}
          @method('PUT')
          <meta name="csrf-token" content="{{ Session::token() }}">  
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
                placeholder="Email" value="{{$vendor->vendor_email}}">
          </div>
          <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{$vendor->vendor_name}}">
          </div>
          <div class="form-group">
              <label for="phone-number">Phone Number</label>
              <input type="text" name="phone-number" class="form-control" id="phone-number" placeholder="Phone Number" value="{{$vendor->vendor_phone_number}}">
          </div>
          @php
            $cities = DB::table('city')->get();
          @endphp
          <div class="form-group">
            <label for="city">City</label><br>
            <select id="city" name="city">
              @foreach($cities as $city)
              <option value={{$city->city_id}} @if($vendor->city_id == $city->city_id) selected="true" @endif>{{$city->city_name}}</option>
              @endforeach
            </select>
          </div><br><br>
          @php
            $vendor_types = DB::table('vendor_type')->get();
          @endphp
          <div class="form-group">
            <label for="vendor-type">Vendor Type</label><br>
            <select id="vendor-type" name="vendor-type">
              @foreach($vendor_types as $vendor_type)
              <option value={{$vendor_type->vendor_type_id}} @if($vendor->vendor_type_id == $vendor_type->vendor_type_id) selected="true" @endif>{{$vendor_type->vendor_type_name}}</option>
              @endforeach
            </select>
          </div><br><br>
          <div class="form-group pt-5 text-right">
              <button type="submit" class="main_btn">Update</button>
          </div>

        </form>
        <!-- END CREATE PACKAGE FORM -->

        <!-- ERROR ALERT BOX -->
        @if($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            @foreach($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
        @endif
        <!-- END ERROR ALERT BOX -->

      </div>
    </div>
  </div>


@endsection  

@section('script')

<script type="text/javascript">

</script>  

@endsection



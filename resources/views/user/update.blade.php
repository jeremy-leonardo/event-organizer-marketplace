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

        <!-- USER FORM -->
        <form method="POST" action="/user/{{$user->user_id}}/edit">
          {{ csrf_field() }}
          @method('PUT')
          <meta name="csrf-token" content="{{ Session::token() }}">  
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
                placeholder="Email" value="{{$user->user_email}}">
          </div>
          <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{$user->user_name}}">
          </div>
          <div class="form-group">
              <label for="phone-number">Phone Number</label>
              <input type="text" name="phone-number" class="form-control" id="phone-number" placeholder="Phone Number" value="{{$user->user_phone_number}}">
          </div>
         
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



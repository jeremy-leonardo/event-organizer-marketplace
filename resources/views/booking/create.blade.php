@extends('layouts.app')

@section('style')

@endsection

@section('content')

  
  <div class="container pt-5 pb-5">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        
        <div class="main_title">
          <h2><span>Create a New Booking</span></h2>
        </div>

        <!-- CREATE PACKAGE FORM -->
        <form method="POST" action="/booking/create">
          {{ csrf_field() }}
          <meta name="csrf-token" content="{{ Session::token() }}">  
          <div class="form-group">
            <label for="event-date">Event Date</label>
            <input type="text" class="date form-control" name="event-date" id="event-date" aria-describedby="help-event-date">
            <small id="help-event-date" class="form-text text-muted">Please use dd-mm-yyyy format</small>
          </div>
          @php
            $cities = DB::table('city')->get();
          @endphp
          <div class="form-group">
            <label for="city">City</label><br>
            <select id="city" name="city">
              @foreach($cities as $city)
              <option value={{$city->city_id}}>{{$city->city_name}}</option>
              @endforeach
            </select>
          </div><br><br>
          <div class="form-group">
            <label for="booking-description">Booking Description</label>
            <textarea class="form-control" name="booking-description" id="booking-description" aria-describedby="help-booking-description" placeholder="Booking Description"></textarea>
            <small id="help-booking-description" class="form-text text-muted">Please describe the event booking as clear as possible</small>
          </div>
          <div class="form-group">
            <button type="submit" class="main_btn">Submit</button>
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

  $('.date').datepicker({  
     format: 'dd-mm-yyyy'
   });  
</script>  

@endsection



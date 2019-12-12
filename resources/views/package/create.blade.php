@extends('layouts.app')

@section('style')

@endsection

@section('content')

  
  <div class="container pt-5">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        
        <div class="main_title">
          <h2><span>Create a New Package</span></h2>
        </div>

        <!-- CREATE PACKAGE FORM -->
        <form method="POST" action="/package/create">
          {{ csrf_field() }}
          <meta name="csrf-token" content="{{ Session::token() }}">  
          <div class="form-group">
            <label for="package-name">Package Name</label>
            <input type="text" class="form-control" name="package-name" id="package-name" aria-describedby="help-package-name" placeholder="Package Name">
            <small id="help-package-name" class="form-text text-muted">Example: "The Magnifique Wedding Package"</small>
          </div>
          <div class="form-group">
            <label for="package-price">Package Price</label>
            <input type="number" class="form-control" name="package-price" id="package-price" placeholder="Package Price">
          </div>
          <div class="form-group">
            <label for="package-description">Package Description</label>
            <textarea class="form-control" name="package-description" id="package-description" aria-describedby="help-package-description" placeholder="Package Description"></textarea>
            <small id="help-package-description" class="form-text text-muted">Please describe the package as clear as possible</small>
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

@endsection



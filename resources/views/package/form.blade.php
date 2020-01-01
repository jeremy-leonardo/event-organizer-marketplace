@extends('layouts.app')

@section('style')

@endsection

@section('content')

  
  <div class="container pt-5 pb-5">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        
        <div class="main_title">
          <h2><span>Create a New Package</span></h2>
        </div>

        <!-- CREATE PACKAGE FORM -->
        @php
        $form_url = '';
        if(($edit_mode ?? false) && ($package ?? null)){
          $form_url = "/package/" . $package->package_id . "/edit";
        }else{
          $form_url = "/package/create";
        }
        @endphp
        <form method="POST" action="{{$form_url}}">
          {{ csrf_field() }}
          @if(($edit_mode ?? false) && ($package ?? null))
            @method('PUT')
          @endif
          <meta name="csrf-token" content="{{ Session::token() }}">  
          <div class="form-group">
            <label for="package-name">Package Name</label>
            <input type="text" class="form-control" name="package-name" id="package-name" aria-describedby="help-package-name" placeholder="Package Name"
            @if(($edit_mode ?? false) && ($package ?? null))
              value="{{ $package->package_name }}"
            @endif
            >
            <small id="help-package-name" class="form-text text-muted">Example: "The Magnifique Wedding Package"</small>
          </div>
          <div class="form-group">
            <label for="package-price">Package Price</label>
            <input type="number" class="form-control" name="package-price" id="package-price" placeholder="Package Price"
            @if(($edit_mode ?? false) && ($package ?? null))
              value={{ $package->package_price }}
            @endif
            >
          </div>
          <div class="form-group">
            <label for="package-description">Package Description</label>
            <textarea class="form-control" name="package-description" id="package-description" aria-describedby="help-package-description" placeholder="Package Description" style="height:200px;">@if(($edit_mode ?? false) && ($package ?? null)){{ $package->package_description }}@endif</textarea>
            <small id="help-package-description" class="form-text text-muted">Please describe the package as clear as possible</small>
          </div>
          
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

          <div class="form-group">
            <button type="submit" class="main_btn">Submit</button>
          </div>

        </form>
        <!-- END CREATE PACKAGE FORM -->

      </div>
    </div>
  </div>


@endsection  

@section('script')

@endsection



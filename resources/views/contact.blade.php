@extends('layouts.app')

@section('style')

@endsection

@section('content')

  
  <div class="container pt-5">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        
        <div class="main_title">
          <h2><span>Contact Us</span></h2>
        </div>

        <div class="row">
          <div class="col-md-12 text-center pb-5 mb-5">
            <h3 class="pb-3">Our Team</h3>
            <p>2201731106 - JEREMY LEONARDO</p>
            <p>2201829666 -	Aprishiela Hartono Putri</p>
            <p>2201734404	- Gabriel Aldi</p>
            <p>2201768626	- Juan Jonhart Jonathan</p>
            <p>2201829943	- Reyhan Satriya</p>
          </div>
        </div>

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



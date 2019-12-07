@include('layouts._partials.style')

<!-- CARD -->
<div class="row">
    <div class="col-2"></div>
    <div class="col-8 card">
        <div class="card-body">
            <h5 class="card-title">Login As User</h5>

            <!-- LOGIN FORM -->
            <form method="POST" action="/user/login">
                {{ csrf_field() }}
                <meta name="csrf-token" content="{{ Session::token() }}">  
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
                        placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <!-- END LOGIN FORM -->
            <!-- ERROR HANDLE -->
            @if($errors->any())
            <div class="row collapse">
                <ul class="alert-box warning radius">
                    @foreach($errors->all() as $error)
                    <li> {{ $error }} </li>
                    @endforeach
                </ul>
            </div>
            @endif
            <!-- END ERROR HANDLE -->
        </div>
    </div>
    <div class="col-2"></div>
</div>
<!-- END CARD -->
@include('layouts._partials.script')
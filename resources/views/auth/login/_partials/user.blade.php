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
                    <button type="submit" class="main_btn">Submit</button>
                </div>
            </form>
            <!-- END LOGIN FORM -->
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
    <div class="col-2"></div>
</div>
<!-- END CARD -->
@include('layouts._partials.script')
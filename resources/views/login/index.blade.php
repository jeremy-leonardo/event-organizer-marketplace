@include('layouts._partials.style')

<!-- CARD -->
<div class="row">
    <div class="col-2"></div>
    <div class="col-8 card">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>

            <!-- LOGIN FORM -->
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <!-- END LOGIN FORM -->

        </div>
    </div>
    <div class="col-2"></div>
</div>
<!-- END CARD -->
@include('layouts._partials.script')
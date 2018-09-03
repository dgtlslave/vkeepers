@if(session()->has('login_error'))
    <div class="alert alert-danger col-md-6 col-md-offset-3 text-center">{{ session()->get('login_error') }}</div>
@endif

@if(session()->has('logout'))
    <div class="alert alert-info col-md-6 col-md-offset-3 text-center">{{ session()->get('logout') }}</div>
@endif

@if(session()->has('unit'))
    <div class="alert alert-success col-md-6 col-md-offset-3 text-center">{{ session()->get('unit') }}</div>
@endif
<!doctype html>
<html>
    <link rel="icon" href="{{asset('dist/img/AdminLTELogo.png')}}" type="image/icon type">
@include('admin.includes.head')
<body>
    @include('admin.includes.nav')
    @include('admin.includes.sidebar')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
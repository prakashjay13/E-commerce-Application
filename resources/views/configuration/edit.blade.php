<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{asset('dist/img/AdminLTELogo.png')}}" type="image/icon type">
        <title>Ecomm-App | Configuration</title>
    
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    
        <!-- Theme style -->
        <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    
    
        <style>
            .container {
                display: flex;
                justify-content: center;
            }
    
        </style>
    </head>
    
    <body>
    
        @include('admin.includes.nav')
        @include('admin.includes.sidebar')
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="row">
    @if(Session::has('msg'))
    <div class="alert alert-danger">{{Session::get('msg')}}</div>
    @endif
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update config</h1>
        
        <form method="post" action="{{ route('configuration.update', $conf->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12"> 
                <label class="form-check-label">Email type:</label>
                <input type="text" class="form-control" name="email_type" value={{ $conf->email_type }} />
                @if($errors->has('email_type'))
                <label class="text text-danger">{{$errors->first('email_type')}}</label>  
                @endif 
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-12"> 
                <label class="form-check-label">Email:</label>
                <input type="text" class="form-control" name="email" value={{ $conf->email }} />
                @if($errors->has('email'))
                <label class="text text-danger">{{$errors->first('email')}}</label>  
                @endif 
            </div>

           
             
            
                <input type="hidden" name="id" value="{{$conf->id}}">
                <div class="text-center mt-2">
              <input type="submit" class="btn btn-success" value="Update"/>
                </div>
            </div>
        </form>
    </div>
</div>
<footer class="main-footer">
    <strong>Copyright &copy; 2021-2022 <a href="https://adminlte.io">Ecomm-Application</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 </body>
   </html> 
<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AdminLTE 3 | DataTables</title>
    
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
        <h1 class="display-3">Update user</h1>
        
        <form method="post" action="{{ route('users.update', $user->id) }}">
            @method('PATCH') 
            @csrf
            <div class="row form-group m-auto col-5">
                <label class="form-check-label">First Name:</label>
                <input type="text" class="form-control" name="firstname" value={{ $user->firstname }} />
                @if($errors->has('firstname'))
                <label class="text text-danger">{{$errors->first('firstname')}}</label>  
                @endif 
            </div>

            <div class="row form-group m-auto col-5">
                <label class="form-check-label">Last Name:</label>
                <input type="text" class="form-control" name="lastname" value={{ $user->lastname }} />
                @if($errors->has('lastname'))
                <label class="text text-danger">{{$errors->first('lastname')}}</label>  
                @endif 
            </div>

            <div class="row form-group m-auto col-5">
                <label class="form-check-label">Email:</label>
                <input type="text" class="form-control" name="email" value={{ $user->email }} />
                @if($errors->has('email'))
                <label class="text text-danger">{{$errors->first('email')}}</label>  
                @endif 
            </div>
            
            <div class="row form-group m-auto col-5">
                <label class="form-check-label">
              <input type="radio" class="form-check-input" name="status" value={{ $user->status }}>Active <br>
              <input type="radio" class="form-check-input" name="status" value={{ $user->status }}>Inactive
              @if($errors->has('status'))
                 <label class="text text-danger">{{$errors->first('status')}}</label>  
                 @endif   
            </label>
           
            
                </div>
                <div class="row form-group m-auto col-5">
                    Roles
                      
                <select name="role" class="form-control">
                    @if($errors->has('role'))
                    <label class="text-danger">{{$errors->first('role')}}</label>
                    @endif 
                <option>Roles Type</option>
                @foreach($data as $a)
                 
                <option value="{{$a['id']}}">{{$a['role_name']}}</option>   
             @endforeach
                </select>
                </div> 
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 </body>
   </html> 
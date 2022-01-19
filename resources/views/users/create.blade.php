<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{asset('dist/img/AdminLTELogo.png')}}" type="image/icon type">
        <title>Ecomm-App | Users</title>
    
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
<div class="container">
 <div class="col-sm-8 offset-sm-2">
    <h1 >Add a user</h1>
  <div>
    @if(Session::has('msg'))
    <div class="alert alert-danger">{{Session::get('msg')}}</div>
    @endif
      <form method="post" action="{{ route('users.store') }}">
          @csrf
          <div class="form-row">
            <div class="form-group col-md-6">  
              <label for="firstname">First Name:</label>
              <input type="text" class="form-control" value="{{old('firstname')}}" name="firstname"/>
              @if($errors->has('firstname'))
              <label class="text-danger">{{$errors->first('firstname')}}</label>
              @endif 
            
          </div>

          <div class="form-group col-md-6">
              <label for="lastname">Last Name:</label>
              <input type="text" class="form-control" value="{{old('lastname')}}" name="lastname"/>
              @if($errors->has('lastname'))
              <label class="text-danger">{{$errors->first('lastname')}}</label>
              @endif 
          </div>

          <div class="form-group col-md-10">
              <label for="email">Email:</label>
              <input type="email" class="form-control" value="{{old('email')}}" name="email"/>
              @if($errors->has('email'))
              <label class="text-danger">{{$errors->first('email')}}</label>
              @endif 
          </div>

          <div class="form-group col-md-10">
            <label for="status">Role: </label>
              
        <select name="role" class="custom-select my-1 mr-sm-2" >
            
        <option>Roles Type</option>
        @foreach($data as $a)
         
        <option value="{{$a['role_name']}}" {{ old('role') == $a['role_name'] ? 'selected': "" }}>{{$a['role_name']}}</option>   
     @endforeach
     @if($errors->has('role'))
            <label class="text-danger">{{$errors->first('role')}}</label>
            @endif 
        </select>
        </div> 

          <div class="form-group col-md-6">
              <label for="password">Password:</label>
              <input type="password" class="form-control" value="" name="password"/>
              @if($errors->has('password'))
              <label class="text-danger">{{$errors->first('password')}}</label>
              @endif 
          </div>
          
          
          <div class="form-group col-md-6">
            <label for="cpass">Confirm Password:</label>
            <input type="password" class="form-control" value="" name="cpass"/>
            @if($errors->has('cpass'))
            <label class="text-danger">{{$errors->first('cpass')}}</label>
            @endif 
        </div>
        

        <fieldset class="form-group">
          <div class="row">
            <label class="col-form-label col-sm-2 pt-0">Status:</label><br>
            <div class="col-sm-10">
              <div class="form-check"><br>
          <input type="radio" class="form-check-input" {{old('status') == 1 ? 'checked': ""}} name="status" value="1">Active 
              </div>
          <div class="form-check">
          <input type="radio" class="form-check-input" {{old('status') == 0 ? 'checked': ""}} name="status" value="0">Inactive <br>
          </div>
          @if($errors->has('status'))
             <label class="text text-danger">{{$errors->first('status')}}</label>  
             @endif   
            </div>
          </div>
          </div>
        </fieldset>

          </div>
                               
          <button type="submit" class="btn btn-success">Add user</button>
         
      </form>
  </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 </body>
 
   </html>    
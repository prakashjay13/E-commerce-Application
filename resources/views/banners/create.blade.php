<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{asset('dist/img/AdminLTELogo.png')}}" type="image/icon type">
        <title>Ecomm-App | Banner</title>
    
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
    <h1 >Add a banner</h1>
  <div>
    @if(Session::has('msg'))
    <div class="alert alert-danger">{{Session::get('msg')}}</div>
    @endif
      <form method="post" action="{{ route('banners.store') }}" enctype="multipart/form-data">
          @csrf
          <h2 class="text-center text-dark">Banner management</h2>
         
          <div class="form-group">
            <label for="heading">Heading:</label>
          <input type="text" class="form-control" value="{{old('heading')}}" name="heading"/>
         @if($errors->has('heading'))
         <label class="text text-danger">{{$errors->first('heading')}}</label>  
         @endif 
          
        </div>

         <div class="form-group">
            <label for="description">Description:</label> 
            <input type="text" class="form-control" value="{{old('description')}}" name="description"/>
        @if($errors->has('description'))
         <label class="text text-danger">{{$errors->first('description')}}</label>  
         @endif 
         
        </div>

        <div class="form-group">
          <label for="image">Image:</label>
        <input type="File" class="form-control" name="image"/>
        @if($errors->has('image'))
         <label class="text text-danger">{{$errors->first('image')}}</label>  
         @endif 
           
        </div>

        <div class="form-group">
          <label for="status">Status:</label>
        <input type="checkbox"   name="status"/>  0=visible , 1=hidden
           
        </div>
         
       
      <input type="submit" class="btn btn-success" value="Submit"/>
        
      </form>
  </div>
</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 </body>
   </html>    
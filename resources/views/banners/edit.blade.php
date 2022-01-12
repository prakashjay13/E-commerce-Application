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
               <h1 >Update banner</h1>
             <div>
    @if(Session::has('msg'))
    <div class="alert alert-danger">{{Session::get('msg')}}</div>
    @endif
    
        <form method="post" action="{{ route('banners.update', $data->id) }}" enctype="multipart/form-data">
            @method('PATCH') 
            <h2 class="text-center text-dark">Banner management</h2>
        @csrf
        <div class="form-group">
            <label for="heading">Heading: </label> 
        <input type="text" class="form-control" value="{{$data->heading}}" name="heading"/>
       @if($errors->has('heading'))
       <label class="text text-danger">{{$errors->first('heading')}}</label>  
       @endif 
      
        
      </div>
      <div class="form-group">
        <label for="description">Description: </label> 
      <input type="text" class="form-control" value="{{$data->description}}" name="description"/>
      @if($errors->has('description'))
       <label class="text text-danger">{{$errors->first('description')}}</label>  
       @endif 
       
      </div>
      <div class="form-group">
      <label for="image">Image: </label> 
      <input type="File" class="form-control" name="image"/><br>
      <img src="{{ asset('storage/'.$data->image)}}" width="100px" height="100px">
      @if($errors->has('image'))
       <label class="text text-danger">{{$errors->first('image')}}</label>  
       @endif 
         
      </div><br>
      <div class="form-group">
        <label for="status">Status: </label>  <br> 
      <input type="checkbox" name="status" {{$data->status == '1' ? 'checked':''}}  />  0=visible , 1=hidden
         
      </div>
      <input type="hidden" value="{{$data->id}}" name="id">
      <br>
       
      <div class="text-center mt-2">
    <input type="submit" class="btn btn-success" value="Update"/>
      </div>
        </form>
    
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 </body>
   </html> 
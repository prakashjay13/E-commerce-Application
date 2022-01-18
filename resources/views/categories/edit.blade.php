<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{asset('dist/img/AdminLTELogo.png')}}" type="image/icon type">
        <title>Ecomm-App | Categories</title>
    
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
        <h1 class="display-3">Update category</h1>
        
        <form method="post" action="{{ route('categories.update', $category->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
                <label class="form-check-label">Title:</label>
                <input type="text" class="form-control" name="title" value={{ $category->title }} />
                @if($errors->has('title'))
                <label class="text text-danger">{{$errors->first('title')}}</label>  
                @endif 
            </div>
            <br>

            <div class="form-group">
                <label class="form-check-label">Description:</label>
                <input type="textarea" class="form-control" name="description" value={{ $category->description }} />
                @if($errors->has('description'))
                <label class="text text-danger">{{$errors->first('description')}}</label>  
                @endif 
            </div>
             <br>
            
                <input type="hidden" name="id" value="{{$category->id}}">
                <div class="text-center mt-2">
              <input type="submit" class="btn btn-success" value="Update"/>
                </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 </body>
   </html> 
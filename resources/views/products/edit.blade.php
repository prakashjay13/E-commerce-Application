<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{asset('dist/img/AdminLTELogo.png')}}" type="image/icon type">
        <title>Ecomm-App | Products</title>
    
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
               <h1 >Update product</h1>
             <div>
    @if(Session::has('msg'))
    <div class="alert alert-danger">{{Session::get('msg')}}</div>
    @endif
    
        <form method="post" enctype="multipart/form-data" action="{{ route('products.update', $data->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
                <label  for="name">Name:</label>
                <input type="text" class="form-control" name="name" value={{ $data->name }} />
                @if($errors->has('name'))
                <label class="text text-danger">{{$errors->first('name')}}</label>  
                @endif 
            </div>
            
            <div class="form-group">
                <label for="description">Description:</label>
              <input type="text" class="form-control" name="description" value={{ $data->description }}/>
              @if($errors->has('description'))
               <label class="text text-danger">{{$errors->first('description')}}</label>  
               @endif 
                 
              </div>
            <div class="form-group">
                <label  for="price">Price:</label>
                <input type="text" class="form-control" name="price" value={{ $data->price }} />
                @if($errors->has('price'))
                <label class="text text-danger">{{$errors->first('price')}}</label>  
                @endif 
            </div>
            
             <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control"  name="quantity" value={{ $data->quantity }} />
                @if($errors->has('quantity'))
                <label class="text text-danger">{{$errors->first('quantity')}}</label>  
                @endif 
            </div>

            <div class="form-group">
                <label for="category">Category:</label>
                <select name="category" class="form-control">
                <option>Category Type</option>
            @foreach($category as $c)
             
            <option value="{{$c['id']}}">{{$c['title']}}</option>   
         @endforeach
            </select>
            @if($errors->has('category'))
            <label class="text-danger">{{$errors->first('category')}}</label>
            @endif  
            </div>
            
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" name="image[]"multiple>
                <br><br> 
                @foreach($product_image as $image)
                 <img src="{{url('storage/' .$image->image)}}" width="100px">
                    <a href="/Image/{{$image->id}}"></a>
                @endforeach 
              @if($errors->has('image'))
               <label class="text text-danger">{{$errors->first('image')}}</label>  
               @endif 
                 
              </div>

                <input type="hidden" name="uid" value="{{ $data->id }}">
                
              <input type="submit" class="btn btn-success" value="Update"/>
                
        </form>
    
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 </body>
   </html> 
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
        <h1 class="display-3">Update product</h1>
        
        <form method="post" action="{{ route('products.update', $product->id) }}">
            @method('PATCH') 
            @csrf
            <div class="row form-group m-auto col-5">
                <label class="form-check-label">Name:</label>
                <input type="text" class="form-control" name="name" value={{ $product->name }} />
                @if($errors->has('name'))
                <label class="text text-danger">{{$errors->first('name')}}</label>  
                @endif 
            </div>
            <br>

            <div class="row form-group m-auto col-5">
                <label class="form-check-label">Price:</label>
                <input type="text" class="form-control" name="price" value={{ $product->price }} />
                @if($errors->has('price'))
                <label class="text text-danger">{{$errors->first('price')}}</label>  
                @endif 
            </div>
             <br>
            <div class="row form-group m-auto col-5">
                <label class="form-check-label">Quantity:</label>
                <input type="number" class="form-control" min="1" max="20"  name="quantity" value={{ $product->quantity }} />
                @if($errors->has('quantity'))
                <label class="text text-danger">{{$errors->first('quantity')}}</label>  
                @endif 
            </div>
            <br>
            
            <div class="row form-group m-auto col-5">
                    Type:
                      
            <select name="category" class="form-control">
                    @if($errors->has('category'))
                    <label class="text-danger">{{$errors->first('category')}}</label>
                    @endif 
                <option>Type</option>
                @foreach($cat as $c)
                 
                <option value="{{$c['id']}}">{{$c['title']}}</option>   
             @endforeach
                </select>
                </div> 
                <input type="hidden" name="uid" value="{{ $product->id }}">
                <div class="text-center mt-2">
              <input type="submit" class="btn btn-success" value="Update"/>
                </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 </body>
   </html> 
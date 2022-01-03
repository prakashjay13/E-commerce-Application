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
    <h1 >Add a product</h1>
  <div>
    @if(Session::has('msg'))
    <div class="alert alert-danger">{{Session::get('msg')}}</div>
    @endif
      <form method="post" action="{{ route('products.store') }}">
          @csrf
          <div class="row form-group m-auto col-5">  
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name"/>
              @if($errors->has('name'))
              <label class="text-danger">{{$errors->first('name')}}</label>
              @endif 
          </div>


          <div class="row form-group m-auto col-5">
              <label for="price">Price:</label>
              <input type="text" class="form-control" name="price"/>
              @if($errors->has('price'))
              <label class="text-danger">{{$errors->first('price')}}</label>
              @endif 
          </div>
          <div class="row form-group m-auto col-5">
              <label for="quantity">Quantity:</label>
              <input type="number" class="form-control" min="1" max="20" name="quantity"/>
              @if($errors->has('quantity'))
              <label class="text-danger">{{$errors->first('quantity')}}</label>
              @endif 
          </div>
          <br>
         
          

          <div class="row form-group m-auto col-5">
            <label for="title">Title: </label>
              
        <select name="category" class="form-control">
            {{-- @if($errors->has('title'))
            <label class="text-danger">{{$errors->first('title')}}</label>
            @endif  --}}
        <option>Category Type</option>
        @foreach($cat as $c)
         
        <option value="{{$c['id']}}">{{$c['title']}}</option>   
     @endforeach
        </select>
        </div> 
          <br>
          <div class="row form-group m-auto col-5">                       
          <button type="submit" class="btn btn-success">Add product</button>
          </div>
      </form>
  </div>
</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 </body>
   </html>    
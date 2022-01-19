<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{asset('dist/img/AdminLTELogo.png')}}" type="image/icon type">
        <title>Ecomm-App | Coupons</title>
    
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
    <h1 >Add a coupon</h1>
  <div>
    @if(Session::has('msg'))
    <div class="alert alert-danger">{{Session::get('msg')}}</div>
    @endif
      <form method="post" action="{{ route('coupons.store') }}">
          @csrf
          <div class="form-row">
          <div class="form-group col-md-12">  
              <label for="code">Code:</label>
              <input type="text" class="form-control" value="{{old('code')}}" name="code"/>
              @if($errors->has('code'))
              <label class="text-danger">{{$errors->first('code')}}</label>
              @endif 
          </div>

          <div class="form-group col-md-12">
              <label for="type">Coupon Type:</label>
              <select name="type" class="custom-select my-1 mr-sm-2" >
              <option value="">Select a coupon type</option>
              <option value="fixed">Fixed</option>
              <option value="percent">Percent</option>
              @if($errors->has('type'))
              <label class="text-danger">{{$errors->first('type')}}</label>
              @endif 
            </select>
          </div>
        
          <div class="form-group col-md-12">  
            <label for="value">Coupon Value:</label>
            <input type="text" class="form-control" value="{{old('value')}}" name="value"/>
            @if($errors->has('value'))
            <label class="text-danger">{{$errors->first('value')}}</label>
            @endif 
        </div>

                                
          <button type="submit" class="btn btn-success">Add coupon</button>
         
          </div>
      </form>
  </div>
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
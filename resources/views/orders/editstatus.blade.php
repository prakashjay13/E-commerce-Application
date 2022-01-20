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
               <h1 >Update Status:</h1>
             <div>
    @if(Session::has('msg'))
    <div class="alert alert-danger">{{Session::get('msg')}}</div>
    @endif
   
        
        <form method="post" action="{{url('/updatestatus')}}"> 
            @csrf
            
                <div class="form-group col-md-12"> 
                        <label for="status">Status:</label>
                    <input type="text" class="form-control" name="status" value={{ $order->status }} />
                    @if($errors->has('status'))
                    <label class="text text-danger">{{$errors->first('status')}}</label>  
                    @endif 
                    
                </div>

            
                <div class="form-group col-md-12"> 
                        <label for="tracking_id">Order_Id:</label>
                    <input type="text" class="form-control" name="tracking_id" value={{ $order->tracking_id }} />
                    @if($errors->has('tracking_id'))
                    <label class="text text-danger">{{$errors->first('tracking_id')}}</label>  
                    @endif 
                    
                </div>
            

            
                
                <input type="hidden" name="id" value="{{$order->id}}">
               <br>
                <div class="text-center mt-2">
                    <input type="submit" class="btn btn-success" value="Update"/>
                </div>
           
        </form>
    
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 </body>
   </html> 
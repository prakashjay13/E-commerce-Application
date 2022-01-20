<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="container">
   <div class="container">
        <p>
        Ecomm App is home to a multitude of leading international and national brands for apparels, fragrances, accessories, cosmetics, footwear, home décor and furnishings catering to the needs of the entire family. We aspire to provide our customers a memorable international shopping experience. We are one of the largest chain of department stores across India.
        </p>
        <p>
        <h3>Hello User,
            Here are the details regarding your order.
        </h3>
        <br>
        Following are his details :
        </p>
   </div>
    <table class="table">
        <tr>
        <th><b>Name :</b></th>
        <td>{{$name}}</td>
        </tr>
        <tr>
        <th><b>Email :</b></th>
        <td>{{$email}}</td>
        </tr>
        <tr>
            <th><b>Price :</b></th>
            <td>{{$price}}</td>
        </tr>
        <tr>
             <th><b>Quantity :</b></th>
             <td>{{$quantity}}</td>
         </tr>
            <tr>
                <th><b>Order Id :</b></th>
                <td>{{$order_id}}</td>
            </tr>
         <tr>
            <th><b>Address :</b></th>
            <td>{{$address}}</td>
        </tr>
  </tbody>
</table>
<div class="container">
  <p>
    <h2>Thanks & Regards,</h2><br>
    <h5>Ecomm App Team.</h5>
  </p>
</div>

</body>
</html>
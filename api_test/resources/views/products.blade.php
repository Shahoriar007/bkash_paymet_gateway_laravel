<html>
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Product Purchase</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>

  <h1>Product Name</h1>
  <p>Price: $50</p>
  <p>Invoice Number: INV12345</p>
  <p id="token"></p>

  <button id="pay-now-btn">Pay Now</button>
  

<script>
  $(document).ready(function() {

    
    var token_id = null;
    
    $('#pay-now-btn').click(function() {

      var price = 50;
      var invoice = 'INV12345';
      var callBackURL = 'http://127.0.0.1:8000/products';
      var bkashURL;
      
      

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({

        type: 'POST',
        url: "{{ route('getToken') }}",
        data: {price: price, callBackURL: callBackURL, invoice: invoice},

        success: function(data) {

          //console.log(data.value1.bkashURL);

          token_id = data.value2;

          console.log(token_id);
          sessionStorage.setItem('token_id', data.value2);

         window.location.href = data.value1.bkashURL;

        }

      });

    });

    var urlParams = new URLSearchParams(window.location.search);

    var urlPaymentID = urlParams.get('paymentID');
    var status = urlParams.get('status');

    console.log(urlPaymentID,status);

    if (status == 'success') {

      var paymentID = urlPaymentID;
      token_id = sessionStorage.getItem('token_id');


      console.log("Token is here:" + token_id);
      
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({

      type: 'POST',
      url: "{{ route('executePayment') }}",
      data: {paymentID: paymentID, token_id: token_id},

      success: function(data) {

        console.log(data);

      }

      });

    }

  });

</script>



</body>
</html>

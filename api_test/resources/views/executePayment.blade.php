<html>
    <head></head>

    <body>
        <h1>Payment Id</h1>
        
    <div id="paymentIdData" hidden>
        {{ $paymentIdData }}
        
    </div>

    <form method="POST" action="{{ route('postPaymentId') }}" >

        @csrf

        <label for="Token">Token:</label>
        <textarea id="Token" name="Token" rows="10" cols="100"></textarea>
        <br>

        <label for="PaymetId">PaymetId:</label>
        <textarea id="PaymetId" name="PaymetId" rows="10" cols="100"></textarea>
        <br>

        <button type="submit">Submit</button>
    </form>

    <script>
        var paymentIdData = JSON.parse('{!! $paymentIdData !!}');
        console.log(paymentIdData.paymentID);
        console.log(paymentIdData.bkashURL);
    </script>



    </body>
</html>


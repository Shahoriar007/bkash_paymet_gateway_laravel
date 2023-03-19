<html>
    <head></head>

    <body>
        <h1>Create Payment</h1>
        
    <div id="bkashURL" hidden>
        {{ $bkashURL }}
        
    </div>

    

    <script>
        var bkashURL = JSON.parse('{!! $bkashURL !!}');
        consol.log("Bkash URL: ")
        console.log(bkashURL);
        
    </script>



    </body>
</html>


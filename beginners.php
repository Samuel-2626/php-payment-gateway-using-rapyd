<?php

if(isset($_POST['submit'])) {

    $amount;
    $cancel_checkout_url = "http://example.com/cancel";
    $complete_checkout_url = "http://example.com/complete";
    $country = "US";
    $currency = "USD";
    $language = "en";

    if((int)($_POST['amount']) === 100) {
        $amount = (int)$_POST['amount'];

        $path = "utilities.php";
        include($path);

        $body = [
            "amount" => $amount,
            "complete_checkout_url" => $complete_checkout_url,
            "country" => $country,
            "currency" => $currency,
            "cancel_checkout_url" => $cancel_checkout_url,
            "language" => $language,
        ];
        
        try {
            $object = make_request('post', '/v1/checkout', $body);

            $redirect_url = $object["data"]["redirect_url"];
            header("Location: $redirect_url");      
        
        } catch(Exception $e) {
            echo "Error =>$e";
        }
    }


}

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP for Beginners</title>
</head>
<body>
    <div>
        
        <h1>PHP for Beginners</h1>
        <p>This book introduces you the basic concepts of the PHP language.</p>
        <bold>$100</bold>
        <br>

        <form method="post">
            <input type="hidden" name="amount" value="100">
            <input type="submit" value="Purchase" name="submit">
        </form> 
    </div>  
</body>
</html>
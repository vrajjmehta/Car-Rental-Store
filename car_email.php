<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Purchase</title>
</head>
<body>

    <div class="container text-center">
        <h1>Sent email successfully.</h1>
        <a href="car_show.php" target="mainFrame" class="btn btn-secondary">Back</a>
    </div>

</body>

<?php

session_start();
ini_set('SMTP','smtp.gmail.com');
ini_set('smtp_port',465);

// Send email
$to = $_REQUEST['emailAddr'];
$subject = 'Your Order Details';
$message = '<h5>This is a confirmation email of your order.</h5>
            <h5>Thanks for renting cars from Hertz-UTS, the total cost is $' . $_SESSION["total"] .
            '</h5><h6>Details are as follows:</h6>';

foreach ($_SESSION["cart"] as $id => $item) {
    $message .= 'Model: '.$item["Brand"].'-'.$item['Model'].'-'.$item['Year'];
    $message .= '<br>Mileage: ' . $item["Mileage"] . ' kms';
    $message .= '<br>Fuel Type: ' . $item['FuelType'];
    $message .= '<br>Seats: ' . $item['Seats'];
    $message .= '<br>Price Per Day: $' . $item['PricePerDay'];
    $message .= '<br>Rent Days: ' . $item['RentalDays'];
    $message .= '<br>Description: ' . $item['Description'];
    $message .= '<br><br>';
}

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

//// More headers
$headers .= 'From:13488642@student.uts.edu.au' . "\r\n";

mail($to, $subject, $message, $headers);

session_destroy();
?>
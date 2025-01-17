<?php
session_start();

// calculate total payment
$total = 0;
$rentalDays = $_REQUEST["rentalDays"];
$index = 0;
foreach ($_SESSION["cart"] as $id => $item) {
    $_SESSION["cart"][$id]["RentalDays"] = $rentalDays[$index];
    $total += $rentalDays[$index++] * $item["PricePerDay"];
}
$_SESSION["total"]=$total;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style type="text/css">
        .form-group .col-form-label:after{
            content: " *";
            color: red;
        }
    </style>

    <title>Checkout</title>
</head>
<body>
    <h1 class="text-center">Check Out</h1>
    <div class="container" style="align-content: center;">
        <h3>Customer Details and Payment</h3>
        <p class="text-info">Please fill in your details. <span style="color: red;">*</span> indicates  field</p>

        <form name="purchaseForm" method="post" action="car_email.php">
        <div class="form-group row">
            <label for="firstName" class="col-sm-2 col-form-label">First Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" required name="firstName" id="firstName" placeholder="First Name">
            </div>
        </div>

        <div class="form-group row">
            <label for="lastName" class="col-sm-2 col-form-label">Last Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" required name="lastName" id="lastName"  placeholder="Last Name">
            </div>
        </div>

        <div class="form-group row">
            <label for="emailAddr" class="col-sm-2 col-form-label">Email Address</label>
            <div class="col-sm-8">
                <input type="email" class="form-control" required name="emailAddr" id="emailAddr"  placeholder="Email Address">
            </div>
        </div>

        <div class="form-group row">
            <label for="addrLine1" class="col-sm-2 col-form-label">Address Line 1</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" required name="addrLine1" id="addrLine1"  placeholder="Address Line 1">
            </div>
        </div>

        <div class="form-group row">
            <label for="addrLine2" class="col-sm-2">Address Line 2</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="addrLine2" id="addrLine2" placeholder="Address Line 2">
            </div>
        </div>
        <div class="form-group row">
            <label for="city" class="col-sm-2 col-form-label">City</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" required name="city" id="city"  placeholder="City">
            </div>
        </div>

        <div class="form-group row">
            <label for="state" class="col-sm-2 col-form-label">State</label>
            <div class="col-sm-8">
                <select class="form-control" required id="state" name="state">
                    <option selected>New South Wales</option>
                    <option>Victoria</option>
                    <option>Queensland</option>
                    <option>Tasmania</option>
                    <option>Western Australia</option>
                    <option>South Australia</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="postCode" class="col-sm-2 col-form-label">Post Code</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" required name="postCode" id="postCode"  placeholder="Post Code">
            </div>
        </div>

        <div class="form-group row">
            <label for="paymentType" class="col-sm-2 col-form-label">Payment Type</label>
            <div class="col-sm-8">
                <select class="form-control" required id="paymentType" name="paymentType">
                    <option>MasterCard</option>
                    <option>PayPal</option>
                    <option selected>VISA</option>
                    <option>Direct deposit</option>
                    <option>Bpay</option>
                </select>
            </div>
        </div>

        <h3>You are required to pay $<?php echo $total;?></h3>
        <div class="form-group row">
            <div class="col-sm-10 text-right">
                <a href="car_show.php" target="mainFrame" class="btn btn-primary">Continue Selection</a>
                <button type="submit" class="btn btn-primary">Booking</button>
            </div>
        </div>

    </form>
    </div>

</body>
</html>
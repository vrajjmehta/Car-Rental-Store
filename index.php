<!DOCTYPE html>
<html lang="en">
<head>
    <!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8">-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>Hertz-UTS</title>
</head>
<body>

<nav class="navbar fixed-top navbar-dark bg-dark">
    <a href="index.php" class="navbar-brand mb-0 h1"><b>Hertz-UTS Car Rental Store</b></a>
    <a href="car_reserve.php" target="mainFrame" class="btn btn-primary">Car Reservation</a>
</nav>

<iframe name="mainFrame" id="mainFrame" frameborder="0" scrolling="no" onload='javascript:resizeIframe(this);'
        style="border-style: none; width: 100%; margin-top: 85px;"
        src="car_show.php">
</iframe>

</body>
</html>
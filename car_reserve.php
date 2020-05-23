<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Car Reservation</title>
</head>
<body>
    <h1 class="text-center">Car Reservation</h1>
    <?php
    session_start();
    if (empty($_SESSION["cart"])){
        echo '<div class="container text-center">';
        echo '<h2>The cart is empty. Please select cars to book.</h2>';
        echo '<a href="car_show.php" target="mainFrame" class="btn btn-primary">Back to Home</a></div>';
    }else{
        echo '<form id="checkoutForm" method="post" action="car_checkout.php">';
        echo '<div class="container">
                <table class="table table-striped">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Thumbnail</th>
                    <th scope="col">Vehicle</th>
                    <th scope="col">Price Per Day</th>
                    <th scope="col">Rental Days</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>';

            foreach ($_SESSION["cart"] as $id => $item) {
                echo '<tr>';
                echo '<td class="align-middle" scope="row"><img style="width: 70px; height: 70px;" class="img-thumbnail" src="static/Images/'.$item["Model"].'.jpg"></td>';
                echo '<td class="align-middle" class="align-middle">'.$item["Year"].'-'.$item["Brand"].'-'.$item["Model"].'</td>';
                echo '<td class="align-middle">$'.$item["PricePerDay"].'</td>';
                echo '<td class="align-middle"><input name="rentalDays[]" type="number" required max="300" min="1" value="'.$item["RentalDays"].'" </td>';
                echo '<td class="align-middle"><button type="submit" onclick="document.getElementById(\'deleteId\').value=' . $id . '" class="btn btn-danger" form="deleteForm">Delete</button></td></tr>';
            }

            echo '</tbody></table>
            <div class="text-right">
                <button type="submit" form="checkoutForm" class="btn btn-primary">Processing to Checkout</button>
            </div></div></form>';
        }
        ?>

<form id="deleteForm" method="post" action="car_remove.php">
    <input hidden name="id" id="deleteId" value="">
</form>

</body>
</html>
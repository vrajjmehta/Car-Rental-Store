<?php
// get request parameter
$id = $_GET["id"];

// set session start
session_start();

// retrieve xml database
$xml = simplexml_load_file("Model/cars.xml") or die("Error: Cannot create Object");
foreach ($xml->children() as $cars) {
    if (($id == $cars->id) && ("Y" == $cars->Availability)){
        // add item to shopping cart
        $car_detail = array(
            "RentalDays" => 1,
            "Mileage" => (string) $cars->Mileage,
            "FuelType" => (string) $cars->FuelType,
            "Seats" => (string) $cars->Seats,
            "Description" => (string) $cars->Description,
            "Brand" => (string) $cars->Brand,
            "Model" => (string) $cars->Model,
            "Year" => (string) $cars->Year,
            "PricePerDay" => (int) $cars->PricePerDay
        );
        // store into session variable if available
        if (!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = array($id => $car_detail);
        } else if (!isset($_SESSION["cart"][$id])) {
            $_SESSION["cart"][$id] = $car_detail;
        }
        echo $cars->Availability;
        return;
    }
}
?>
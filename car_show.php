<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <!-- Vue.js library-->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</head>
<body onload="showCars();">
<div>
    <div class="container">
        <input type="text" class="form-control" id="searchInput" placeholder="Search..">
        <div id="searchCar" class="row mt-3">
            <div class="col-md-3 mb-3" v-for="car in cars">
                <div class="card">
                    <img v-bind:src="'static/Images/'+car.Model+'.jpg'" class="card-img-top img-fluid" style="height: 200px;">
                    <div class="card-body" style="padding-top: 0px; padding-bottom: 0px;">
                        <h5 class="card-title">{{car.Brand}}-{{car.Model}}-{{car.Year}}</h5>
                        <ul class="list-unstyled">
                            <li class="card-text"><b>Mileage: </b>{{car.Mileage}}</li>
                            <li class="card-text"><b>Fuel type: </b>{{car.FuelType}}</li>
                            <li class="card-text"><b>Seats: </b>{{car.Seats}}</li>
                            <li class="card-text"><b>Price per day: </b>${{car.PricePerDay}}</li>
                            <li class="card-text"><b>Availability: </b>{{car.Availability}}</li>
                            <li class="card-text"><b>Description: </b>{{car.Description}}</li>
                        </ul>
                    </div>
                    <a href="#" v-on:click="addToCart(car.id);" class="btn btn-primary">Add to Cart</a></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="static/JS/display.js"></script>
</body>
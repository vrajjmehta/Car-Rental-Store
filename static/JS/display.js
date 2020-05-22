function resizeIframe(iframe) {
    iframe.style.height = iframe.contentWindow.document.body.scrollHeight + 'px';
}

var ajax = false;
if (window.XMLHttpRequest) {
    ajax = new XMLHttpRequest();
} else if (window.ActiveXObject) {
    try {
        ajax = new ActiveXObject("Msxm12.XMLHTTP")
    } catch (e1) {
        try {
            ajax = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (e2) {

        }
    }
}
if (!ajax) {
    alert("Some page functionality is not available.");
}

/*
1. get cars by Ajax
2. blinding cars with Vue for display
 */
var carData = [];

function showCars() {
    if (ajax) {
        ajax.open('get', 'Model/cars.xml');
        ajax.onreadystatechange = function () {
            if (this.status == 200 && this.readyState == 4){
                getCars(this);
            }
        };
        ajax.send();
    }
}

function getCars(xml) {
    var carList = xml.responseXML.getElementsByTagName('item');
    for (var i = 0; i < carList.length; i++) {
        var carItem = {};
        carItem['Category'] = carList.Category;
        for (var j = 0; j < carList[i].childNodes.length; j++) {
            carItem[carList[i].childNodes[j].nodeName] = carList[i].childNodes[j].innerHTML;
        }
        carData.push(carItem);
    }
}

var cars = new Vue({
    el: '#searchCar',
    data: {
        cars: carData
    },
    updated: function() {
        // resize parent iframe
        window.parent.document.getElementById("mainFrame").style.height = document.body.scrollHeight + "px";
    },
    methods: {
        addToCart: function (id) {
            checkAvailability(id);
        }
    }
});

/*
1. check car availability
2. add this car into shopping cart
 */
function checkAvailability(id) {
    if (ajax) {
        ajax.open('get', 'check_availability.php?id=' + id);
        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                handleCheck(this);
            }
        };
        ajax.send();
    }
}

function handleCheck(xml) {
    if (xml.responseText == "Y") {
        alert("Car added to shopping cart successfully.");
    } else {
        alert("Sorry, this Car is not Available now. Please try other cars at the moment.");
    }
}

// searchInput event
$(document).ready(function () {
    $("#searchInput").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#searchCar div").filter(function () {
            $(this).toggle($(this).find(".card-title").text().toLowerCase().indexOf(value) > -1)
        });
    });
});
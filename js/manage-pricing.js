var globalPricingId = null;

function getAllPricing() {
    event.preventDefault();
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../../src/vehicle-price/list_pricing.php', true);
    xhr.onload = function () {
        var response = this.response;

        try {
            var json_array = JSON.parse(response);
            var output = "";

            for(var i in json_array) {
                output += "<tr id="+`${i}`+">"+
                "<td class='row-data'>"+json_array[i].name+"</td>"+
                "<td class='row-data'>"+"LKR "+json_array[i].price+"</td>"+
                "<td>"+"<img"+" src="+"'../images/pencil.png'"+ "alt="+"'edit-icon'"+" class="+"'operation-icons'"+"onclick="+"'openEditPopUp("+`${json_array[i].pricing_id}`+")'"+""+" >"+
                "<img"+" src="+"'../images/delete.png'"+ "alt="+"'delete-icon'"+" class="+"'operation-icons'"+"onclick="+"'deleteItem("+`${json_array[i].pricing_id}`+")'"+""+">"+"</td>"
                +"</tr>";
            }

        document.getElementById("pricing-table-body").innerHTML = output;

        } catch (error) {
            console.log(error)
        }
    };
    xhr.send();
}

function openAddPopUp() {
    var popup = document.getElementById("pricing-add-popup");
    popup.style.display = "block";
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../../src/vehicle-price/get_vehicles_with_no_pricing.php', true);
    xhr.onload = function () {
        var response = this.response;
        try {
            var json_array = JSON.parse(response);
            
            var select = document.getElementById('vehicle-name');
            select.innerHTML = "";
            for (var i = 0; i < json_array.length; i++) {
                select.innerHTML = select.innerHTML +
                    '<option value="' + json_array[i]['vehicle_id'] + '">' + json_array[i]['name'] + '</option>';
            }

        } catch (error) {
            console.log(error)
        }
    };
    xhr.send();
}

function closeAddPopup() {
    var popup = document.getElementById("pricing-add-popup");
    popup.style.display = "none";
}

function openEditPopUp(id) {

    globalPricingId = id;

    var rowId = event.target.parentNode.parentNode.id;
    var data = document.getElementById(rowId).querySelectorAll(".row-data"); 

    var vehicleName = data[0].innerHTML;
    var price = data[1].innerHTML;

    var splittedPrice = price.split("LKR ");

    var popup = document.getElementById("pricing-edit-popup");
    popup.style.display = "block";

    document.getElementById('vehicle-name2').value = vehicleName;
    document.getElementById('pricing2').value = splittedPrice[1];

    
}

function closeEditPopup() {
    var popup = document.getElementById("pricing-edit-popup");
    popup.style.display = "none";
}


function addPricing() {
    event.preventDefault();

    var vehicleId = document.getElementById('vehicle-name').value 
    var price = document.getElementById('pricing').value 

    var confirmBox = confirm("Are you sure you want to add?");
    if (confirmBox == true) {

        var xhr = new XMLHttpRequest();
        
        var data = new FormData();
        data.append('vehicleId', vehicleId);
        data.append('price', price);

        xhr.open('POST', '../../src/vehicle-price/add_pricing.php', true);
        xhr.onload = function () {
            var response = this.responseText;
            alert(response);
            location.reload();
        };
        xhr.send(data);   
    } else {
        return;
    }
}

function deleteItem(id) {
    var confirmBox = confirm("Are you sure you want to delete?");
    if (confirmBox == true) {
        var xhr = new XMLHttpRequest();
        var data = new FormData();
        data.append('pricing_id', id);
        xhr.open('POST', '../../src/vehicle-price/delete_pricing.php', true);
        xhr.onload = function () {
            var response = this.responseText;
            alert(response);
            location.reload();
        };
        xhr.send(data);   
    } else {
        return;
    }
}

function updatePricing() {
    event.preventDefault();
    var pricingId = globalPricingId;
    var price = document.getElementById('pricing2').value;

    var confirmBox = confirm("Are you sure you want to update?");
    if (confirmBox == true) {

        var xhr = new XMLHttpRequest();
        
        var data = new FormData();
        data.append('pricingId', pricingId);
        data.append('price', price);

        xhr.open('POST', '../../src/vehicle-price/update_pricing.php', true);
        xhr.onload = function () {
            var response = this.responseText;
            alert(response);
            location.reload();
        };
        xhr.send(data);   
    } else {
        return;
    }
}
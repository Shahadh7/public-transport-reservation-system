var globalVehicleId = null;

function getAllVehicles() {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../../src/transport-vehicles/list_vehicles.php', true);
    xhr.onload = function () {
        var response = this.response;
        try {
            var json_array = JSON.parse(response);
            console.log(json_array);
            var output = "";

            for(var i in json_array) {
                output += "<tr id="+`${i}`+">"+
                "<td class='row-data'>"+json_array[i].name+"</td>"+
                "<td class='row-data'>"+json_array[i].type+"</td>"+
                "<td class='row-data'>"+json_array[i].location_from+"</td>"+
                "<td class='row-data'>"+json_array[i].location_to+"</td>"+
                "<td class='row-data'>"+json_array[i].owner+"</td>"+
                "<td class='row-data'>"+json_array[i].seat_count+"</td>"+
                "<td class='row-data'>"+json_array[i].number_plate+"</td>"+
                "<td>"+"<img"+" src="+"'../images/pencil.png'"+ "alt="+"'edit-icon'"+" class="+"'operation-icons'"+"onclick="+"'editItem("+`${json_array[i].vehicle_id}`+")'"+""+" >"+
                "<img"+" src="+"'../images/delete.png'"+ "alt="+"'delete-icon'"+" class="+"'operation-icons'"+"onclick="+"'deleteItem("+`${json_array[i].vehicle_id}`+")'"+""+">"+"</td>"
                +"</tr>";
            }

        document.getElementById("transport-table-body").innerHTML = output;

        } catch (error) {
            console.log(error)
        }
    };
    xhr.send();
}

function deleteItem(id) {
    var confirmBox = confirm("Are you sure you want to delete?");
    if (confirmBox == true) {
        var xhr = new XMLHttpRequest();
        var data = new FormData();
        data.append('vehicle_id', id);
        xhr.open('POST', '../../src/transport-vehicles/delete_vehicle.php', true);
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

function editItem(i) {
    console.log(i)
    globalVehicleId = i;

    var rowId = event.target.parentNode.parentNode.id;
    var data = document.getElementById(rowId).querySelectorAll(".row-data"); 

    var name = data[0].innerHTML;
    var type = data[1].innerHTML;
    var location_from = data[2].innerHTML;
    var location_to = data[3].innerHTML;
    var owner = data[4].innerHTML;
    var seat = data[5].innerHTML;
    var numplate = data[6].innerHTML;

    var popup = document.getElementById("trans-edit-popup");
    popup.style.display = "block";
    
    document.getElementById('name').value = name
    document.getElementById('vehicle-type').value = type
    document.getElementById('location-from').value = location_from
    document.getElementById('location-to').value = location_to
    document.getElementById('owner').value = owner
    document.getElementById('seat-count').value = seat
    document.getElementById('num-plate').value = numplate
    
}

function updateEditedValues() {
    event.preventDefault();

    var vehicleId = globalVehicleId
    var name = document.getElementById('name').value 
    var type = document.getElementById('vehicle-type').value 
    var locationFrom = document.getElementById('location-from').value 
    var locationTo = document.getElementById('location-to').value 
    var owner = document.getElementById('owner').value 
    var seatCount = document.getElementById('seat-count').value 
    var numPlate = document.getElementById('num-plate').value 

    var confirmBox = confirm("Are you sure you want to update?");
    if (confirmBox == true) {

        var xhr = new XMLHttpRequest();
        
        var data = new FormData();
        data.append('vehicleId', vehicleId);
        data.append('name', name);
        data.append('type', type);
        data.append('locationFrom', locationFrom);
        data.append('locationTo', locationTo);
        data.append('owner', owner);
        data.append('seatCount', seatCount);
        data.append('numPlate', numPlate);

        xhr.open('POST', '../../src/transport-vehicles/update_vehicle.php', true);
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

function closePopup() {
    var popup = document.getElementById("trans-edit-popup");
    popup.style.display = "none";
}

function openAddPopUp() {
    var popup = document.getElementById("trans-add-popup");
    popup.style.display = "block";
}

function closePopup2() {
    var popup = document.getElementById("trans-add-popup");
    popup.style.display = "none";
}

function addNewVehicle() {
    event.preventDefault();

    var name = document.getElementById('name2').value 
    var type = document.getElementById('vehicle-type2').value 
    var locationFrom = document.getElementById('location-from2').value 
    var locationTo = document.getElementById('location-to2').value 
    var owner = document.getElementById('owner2').value 
    var seatCount = document.getElementById('seat-count2').value 
    var numPlate = document.getElementById('num-plate2').value 

    var confirmBox = confirm("Are you sure you want to add?");
    if (confirmBox == true) {

        var xhr = new XMLHttpRequest();
        
        var data = new FormData();
        data.append('name', name);
        data.append('type', type);
        data.append('locationFrom', locationFrom);
        data.append('locationTo', locationTo);
        data.append('owner', owner);
        data.append('seatCount', seatCount);
        data.append('numPlate', numPlate);

        xhr.open('POST', '../../src/transport-vehicles/add_vehicle.php', true);
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


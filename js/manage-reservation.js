function getAllReservations() {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../../src/reservation/list_reservation.php', true);
    xhr.onload = function () {
        var response = this.response;
        try {
            var json_array = JSON.parse(response);
            var output = "";

            for(var i in json_array) {
                output += "<tr id="+`${i}`+">"+
                "<td class='row-data'>"+json_array[i].username+"</td>"+
                "<td class='row-data'>"+json_array[i].travel_date+"</td>"+
                "<td class='row-data'>"+json_array[i].location_from+"</td>"+
                "<td class='row-data'>"+json_array[i].location_to+"</td>"+
                "<td class='row-data'>"+json_array[i].time+"</td>"+
                "<td class='row-data'>"+json_array[i].number_of_seats+"</td>"+
                "<td class='row-data'>"+json_array[i].paid_amount+"</td>"+
                "<td class='row-data'>"+json_array[i].type+"</td>"+
                "<td class='row-data'>"+json_array[i].name+"</td>"+
                "<td>"+"<img"+" src="+"'../images/pencil.png'"+ "alt="+"'edit-icon'"+" class="+"'operation-icons'"+"onclick="+"'editItem("+`${json_array[i].reservation_id}`+")'"+""+" >"+
                "<img"+" src="+"'../images/delete.png'"+ "alt="+"'delete-icon'"+" class="+"'operation-icons'"+"onclick="+"'deleteReservation("+`${json_array[i].reservation_id}`+")'"+""+">"+"</td>"
                +"</tr>";
            }

        document.getElementById("reservation-table-body").innerHTML = output;

        } catch (error) {
            console.log(error)
        }
    };
    xhr.send();
}

function deleteReservation(reservation_id) {

    var confirmBox = confirm("Are you sure you want to delete?");
    if (confirmBox == true) {
        var xhr = new XMLHttpRequest();
        var data = new FormData();
        data.append('reservation_id',reservation_id)
        xhr.open('POST', '../../src/reservation/delete_reservation.php', true);
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


function makeReservation() {

}
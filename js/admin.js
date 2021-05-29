function getCounts() {
    event.preventDefault();
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../../src/admin/get_counts.php', true);
    xhr.onload = function () {
        var response = this.response;
        try {
            var json_array = JSON.parse(response);
            console.log(json_array)

            var reserve_count = json_array.reserve_count.reserve_count;
            var users_count = json_array.user_count.users_count;
            var vehicle_count = json_array.vehicle_count.vehicle_count; 
            
            document.getElementById("users-count").innerHTML = users_count;
            document.getElementById("reserve-count").innerHTML = reserve_count;
            document.getElementById("vehicle-count").innerHTML = vehicle_count;

        } catch (error) {
            console.log(error)
        }
    };
    xhr.send();
}
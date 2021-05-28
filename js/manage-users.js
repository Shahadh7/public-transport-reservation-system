

function deleteItem(id) {

    alert("Deleted!"+id)
}

function editItem(i) {
    console.log(i)
    alert("edited")
}

function getAllUsers() {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../../src/users/users.php', true);
    xhr.onload = function () {
        var response = this.response;

        try {
            var json_array = JSON.parse(response);
            console.log(json_array);
            var output = "";

            for(var i in json_array) {
                output += "<tr>"+
                "<td>"+json_array[i].username+"</td>"+
                "<td>"+json_array[i].nic+"</td>"+
                "<td>"+"<img"+" src="+"'../images/pencil.png'"+ "alt="+"'edit-icon'"+" class="+"'operation-icons'"+"onclick="+"'editItem("+`${json_array[i].user_id}`+")'"+""+" >"+
                "<img"+" src="+"'../images/delete.png'"+ "alt="+"'delete-icon'"+" class="+"'operation-icons'"+"onclick="+"'deleteItem("+`${json_array[i].user_id}`+")'"+""+">"+"</td>"
                +"</tr>";
            }

        document.getElementById("users-table-body").innerHTML = output;

        } catch (error) {
            console.log(error)
        }
    };
    xhr.send();
}
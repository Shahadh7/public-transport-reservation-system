var globalUserId = null;


function deleteItem(id) {
    var confirmBox = confirm("Are you sure you want to delete?");
    if (confirmBox == true) {
        var xhr = new XMLHttpRequest();
        var data = new FormData();
        data.append('user_id', id);
        xhr.open('POST', '../../src/users/delete_user.php', true);
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
    globalUserId = i;

    var rowId = event.target.parentNode.parentNode.id;
    var data = document.getElementById(rowId).querySelectorAll(".row-data"); 

    var username = data[0].innerHTML;
    var nic = data[1].innerHTML;

    var popup = document.getElementById("user-edit-popup");
    popup.style.display = "block";
    
    document.getElementById('username').value = username
    document.getElementById('user-nic').value = nic
}

function updateEditedValues() {
    event.preventDefault();
    var userId = globalUserId
    var username = document.getElementById('username').value
    var nic = document.getElementById('user-nic').value

    var confirmBox = confirm("Are you sure you want to update?");
    if (confirmBox == true) {

        var xhr = new XMLHttpRequest();
        
        var data = new FormData();
        data.append('user_id', userId);
        data.append('username', username);
        data.append('nic', nic);

        xhr.open('POST', '../../src/users/update_user.php', true);
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
    var popup = document.getElementById("user-edit-popup");
    popup.style.display = "none";
}

function getAllUsers() {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../../src/users/list_users.php', true);
    xhr.onload = function () {
        var response = this.response;

        try {
            var json_array = JSON.parse(response);
            console.log(json_array);
            var output = "";

            for(var i in json_array) {
                output += "<tr id="+`${i}`+">"+
                "<td class='row-data'>"+json_array[i].username+"</td>"+
                "<td class='row-data'>"+json_array[i].nic+"</td>"+
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

function searchUser() {
    var username = document.getElementById("search-users").value;
    if(username.length >3) {
        console.log(username);
        var data = new FormData();
        data.append('search_text', username);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../../src/users/search_user.php', true);
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
        xhr.send(data);
    }else if(username.length === 0) {
        getAllUsers()
    }
    
}
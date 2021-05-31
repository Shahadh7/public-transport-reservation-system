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
    var email = data[2].innerHTML;
    var phone = data[3].innerHTML;

    if(email == null) {
        email = ""
    }

    if(phone == null) {
        phone = ""
    }

    var popup = document.getElementById("user-edit-popup");
    popup.style.display = "block";
    
    document.getElementById('username').value = username
    document.getElementById('user-nic').value = nic
    document.getElementById('email').value = email
    document.getElementById('phone').value = phone

}

function updateEditedValues() {
    event.preventDefault();
    var userId = globalUserId
    var username = document.getElementById('username').value
    var nic = document.getElementById('user-nic').value
    var email = document.getElementById('email').value
    var phone = document.getElementById('phone').value

    if(username == "" || nic == "") {
        if(username == "") {
            document.getElementById("username-error").innerHTML = "Username cannot be empty!"
            
        }
        if(nic == "") {
            document.getElementById("nic-error").innerHTML = "NIC cannot be empty!"
            
        }
        return;
    }

    if(email != "" && phone != "") {
        emailVal()
        phoneVal()
    }

    var userError = document.getElementById("username-error").innerHTML;
    var emailError = document.getElementById("email-error").innerHTML;
    var nicError = document.getElementById("nic-error").innerHTML;
    var phoneError = document.getElementById("phone-error").innerHTML;



    if(userError != "" || emailError != "" || phoneError != "" || nicError != "") {
        return;
    }

    var confirmBox = confirm("Are you sure you want to update?");
    if (confirmBox == true) {

        var xhr = new XMLHttpRequest();
        
        var data = new FormData();
        data.append('user_id', userId);
        data.append('username', username);
        data.append('nic', nic);
        data.append('email', email);
        data.append('phone', phone);

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


function usernameVal() {
    var text = document.getElementById("username").value;

    if (text.length < 3) {
        document.getElementById("username-error").innerHTML = "Username must be atleast 3 characters!"
        return;
    }
    if(text.length >0){
        document.getElementById("username-error").innerHTML = ""
        return;
    }else if (text.length == 0) {
        document.getElementById("username-error").innerHTML = "Username cannot be empty!"
        return;
    }
}

function nicVal() {
    var text = document.getElementById("user-nic").value;

    if(text.length >0){
        document.getElementById("nic-error").innerHTML = ""
    }else if (text.length == 0) {
        document.getElementById("nic-error").innerHTML = "NIC cannot be empty!"
    }
    if (text.length < 10) {
        document.getElementById("nic-error").innerHTML = "NIC must be 10 characters!"
    }
    if(text.length > 10) {
        document.getElementById("nic-error").innerHTML = "NIC must be 10 characters!"
    }  
}

function emailVal() {
    var text = document.getElementById("email").value;

    var mailformat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if(!text.match(mailformat)) {
        document.getElementById("email-error").innerHTML = "Email must be a valid email!"
    }else {
        document.getElementById("email-error").innerHTML = ""
    }
    if(text.length == 0) {
        document.getElementById("email-error").innerHTML = ""
    }
}

function phoneVal() {
    var text = document.getElementById("phone").value;
    // var numRegex = /^[0-9]+$/ ;

    if(text.length >0){
        if(text.length != 10) {
            document.getElementById("phone-error").innerHTML = "phone must be 10 digits!"
        }else{
            document.getElementById("phone-error").innerHTML = ""
        }
        if((isNaN(text))) {
            document.getElementById("phone-error").innerHTML = "phone must contain only digits!"
        }
    }else {
        document.getElementById("phone-error").innerHTML = ""
    }
}

function clearValidationErrors() {
    document.getElementById("nic-error").innerHTML = ""
    document.getElementById("name-error").innerHTML = ""
    document.getElementById("email-error").innerHTML = ""
    document.getElementById("phone-error").innerHTML = ""
}


function closePopup() {
    var popup = document.getElementById("user-edit-popup");
    popup.style.display = "none";
    location.reload();
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
                if(json_array[i].email == null) {
                    json_array[i].email = "";
                }

                if(json_array[i].phone == null) {
                    json_array[i].phone = "";
                }

                output += "<tr id="+`${i}`+">"+
                "<td class='row-data'>"+json_array[i].username+"</td>"+
                "<td class='row-data'>"+json_array[i].nic+"</td>"+
                "<td class='row-data'>"+json_array[i].email+"</td>"+
                "<td class='row-data'>"+json_array[i].phone+"</td>"+
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
                    output += "<tr id="+`${i}`+">"+
                    "<td class='row-data'>"+json_array[i].username+"</td>"+
                    "<td class='row-data'>"+json_array[i].nic+"</td>"+
                    "<td class='row-data'>"+json_array[i].email+"</td>"+
                    "<td class='row-data'>"+json_array[i].phone+"</td>"+
                    "<td class='row-data'>"+"<img"+" src="+"'../images/pencil.png'"+ "alt="+"'edit-icon'"+" class="+"'operation-icons'"+"onclick="+"'editItem("+`${json_array[i].user_id}`+")'"+""+" >"+
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
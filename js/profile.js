function getUserData() {
    event.preventDefault();
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../../src/profile/get_userdata.php', true);
    xhr.onload = function () {
        var response = this.response;

        try {
            var json_array = JSON.parse(response);
            console.log(json_array)
            if(json_array.length > 0) {
                for(var i in json_array) {
                    document.getElementById("username").value = json_array[i].username ; 
                    document.getElementById("email").value = json_array[i].email ; 
                    document.getElementById("phone").value = json_array[i].phone ;
                    document.getElementById("nic").value = json_array[i].nic ;            
                }
            }
            

        } catch (error) {
            console.log(error)
        }
    };
    xhr.send();
    
}

function changeUserData() {
    event.preventDefault();

    var username = document.getElementById('username').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var old_password = document.getElementById('old_password').value;
    var new_password = document.getElementById('new_password').value;
    var new_confirm_password = document.getElementById('new_confirm_password').value;

    if(username == "") {
        document.getElementById("username-error").innerHTML = "Username cannot be empty!"
        return;
    }
    
    var userError = document.getElementById("username-error").innerHTML;
    var emailError = document.getElementById("email-error").innerHTML;
    var phoneError = document.getElementById("phone-error").innerHTML;
    var oldPassError = document.getElementById("old-pass-error").innerHTML;
    var newPassError = document.getElementById("new-pass-error").innerHTML;
    var newConfPassError = document.getElementById("new-confirm-pass-error").innerHTML;

    console.log(userError)

    if(userError != "" || emailError != "" || phoneError != "" || oldPassError != "" || newPassError != "" || newConfPassError != "") {
        return;
    }

    var oldPass = document.getElementById("old_password").value;
    if(oldPass.length > 0) {
        var xhr = new XMLHttpRequest();
        
        var data = new FormData();
        data.append('old_pass', oldPass);

        xhr.open('POST', '../../src/profile/check_pass.php', true);
        xhr.onload = function () {
            var response = this.responseText;
            if(response == '"false"') {
                var oldPassError = document.getElementById("old-pass-error").innerHTML = "Invalid old password! ";
            }else {
                var newPass = document.getElementById("new_password").value;
                var confirmPass = document.getElementById("new_confirm_password").value;

                if(newPass == "" || confirmPass == "") {
                    var newPassError = document.getElementById("new-pass-error").innerHTML = "Please enter new password";
                    var newConfPassError = document.getElementById("new-confirm-pass-error").innerHTML = "Please enter confirm password";
                }else {
                    var username = document.getElementById('username').value;
                    var email = document.getElementById('email').value;
                    var phone = document.getElementById('phone').value;
                    var new_pass = document.getElementById('new_password').value;

                    var xhr = new XMLHttpRequest();
        
                    var data = new FormData();
                    data.append('username', username);
                    data.append('email', email);
                    data.append('phone', phone);
                    data.append('password', new_pass);
                    xhr.open('POST', '../../src/profile/update_profile.php', true);
                    xhr.onload = function () {
                        var response = this.responseText; 
                        if(response == '"updated"') {
                            alert("Updated successfully!")
                            location.reload();
                        }
                        
                    }
                    xhr.send(data);
                }
            }
            
        };
        xhr.send(data); 
    }else {
        var username = document.getElementById('username').value;
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;

        var xhr = new XMLHttpRequest();

        var data = new FormData();
        data.append('username', username);
        data.append('email', email);
        data.append('phone', phone);
        xhr.open('POST', '../../src/profile/update_profile.php', true);
        xhr.onload = function () {
            var response = this.responseText; 
            if(response == '"updated"') {
                alert("Updated successfully!")
                location.reload();
            }else {
                alert(response);
            }
        }
        xhr.send(data);
    }
}


function usernameVal() {
    var text = document.getElementById("username").value;

    if(text.length >0){
        document.getElementById("username-error").innerHTML = ""
        return;
    }else if (text.length == 0) {
        document.getElementById("username-error").innerHTML = "Username cannot be empty!"
        return;
    }
    if (text.length < 3) {
        document.getElementById("username-error").innerHTML = "Username must be atleast 3 characters!"
        return;
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

function passVal() {
    var text = document.getElementById("old_password").value;

    

    if(text.length > 0) {
        if(text.length < 6) {
            document.getElementById("old-pass-error").innerHTML = "Password must be atleat 6 characters!"
        } else {
            document.getElementById("old-pass-error").innerHTML = ""
        }
    }
    if(text.length == 0 ) {
        document.getElementById("old-pass-error").innerHTML = ""
    }
}

function newPassVal() {
    var text = document.getElementById("new_password").value;

    if(text.length > 0) {
        if(text.length < 6) {
            document.getElementById("new-pass-error").innerHTML = "Password must be atleat 6 characters!"
        } else {
            document.getElementById("new-pass-error").innerHTML = ""
        }
    }
    if(text.length == 0 ) {
        document.getElementById("new-pass-error").innerHTML = ""
    }
}

function newConfirmPassVal() {
    var text = document.getElementById("new_confirm_password").value;
    var text2 = document.getElementById("new_password").value;

    if(text.length > 0) {
        if(text.length < 6) {
            document.getElementById("new-confirm-pass-error").innerHTML = "Password must be atleat 6 characters!"
        } else {
            document.getElementById("new-confirm-pass-error").innerHTML = ""
        }
        if(text != text2) {
            document.getElementById("new-confirm-pass-error").innerHTML = "Password does not match!"
        } 

    }
    if(text.length == 0 ) {
        document.getElementById("new-confirm-pass-error").innerHTML = ""
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

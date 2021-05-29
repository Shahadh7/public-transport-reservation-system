function signup() {
    event.preventDefault()

    var username = document.getElementById('username').value;
    var nic = document.getElementById('nic').value;;
    var password = document.getElementById('password').value;

    if(username == "") {
        document.getElementById("username-error").innerHTML = "Username cannot be empty!"
        return;
    } 
    if (nic == "") {
        document.getElementById("nic-error").innerHTML = "NIC cannot be empty!"
        return;
    }
    if (password == "") {
        document.getElementById("password-error").innerHTML = "Password cannot be empty"
        return;
    }

    var userError = document.getElementById("username-error").innerHTML;
    var passError = document.getElementById("password-error").innerHTML;
    var nicError = document.getElementById("nic-error").innerHTML;

    console.log(userError)

    if(userError != "" || passError != "" || nicError != "") {
        return;
    }

    var data = new FormData();
    data.append('username', username);
    data.append('nic', nic);
    data.append('password', password);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../../src/auth/signup.php', true);
    xhr.onload = function () {
        console.log(this.responseText)
        if(this.responseText == '"Success"') {
            alert("successfully registered!")
            window.location.replace("../views/login.php");
        }
        
    };
    xhr.send(data);

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

function nicVal() {
    var text = document.getElementById("nic").value;

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

function passVal() {
    var text = document.getElementById("password").value;

    if(text.length >0){
        document.getElementById("password-error").innerHTML = ""
    }else if (text.length == 0) {
        document.getElementById("password-error").innerHTML = "Password cannot be empty!"
    } 
}

function login() {
    event.preventDefault()
    username = document.getElementById('username').value
    password = document.getElementById('password').value

    var data = new FormData();
    data.append('username', username);
    data.append('password', password);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../../src/auth/login.php', true);
    xhr.onload = function () {
        console.log(this.responseText)
        if(this.responseText == '"invalid username or password"') {
            alert("Invalid username or password!");
        }else if(this.responseText == '"success"') {
            window.location.replace("/");
        }
        
    };
    xhr.send(data);

}

function logout() {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../../src/auth/logout.php', true);
    xhr.onload = function () {
        if(this.responseText == '"successfully logout"') {
            window.location.replace("/");
        }
        
    };
    xhr.send();
}

function adminLogin() {
    username = document.getElementById('admin-username').value
    password = document.getElementById('admin-password').value

    var data = new FormData();
    data.append('username', username);
    data.append('password', password);
    data.append('is_admin', "true");

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../../src/auth/login.php', true);
    xhr.onload = function () {
        if(this.responseText == '"invalid username or password"') {
            alert("Invalid username or password!");
        }else if(this.responseText == '"success!"') {
            window.location.replace("admin.php");
        }
    };
    xhr.send(data);
}
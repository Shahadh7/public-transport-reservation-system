function login() {

    username = document.getElementById('username').value
    password = document.getElementById('password').value

    var data = new FormData();
    data.append('username', username);
    data.append('password', password);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../../src/auth/login.php', true);
    xhr.onload = function () {
        // do something to response
        console.log(this.responseText);
        alert(this.responseText)
    };
    xhr.send(data);

}

function logout() {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../../src/auth/logout.php', true);
    xhr.onload = function () {
        // do something to response
        alert(this.responseText)
        if(this.responseText) {
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
        // do something to response
        console.log(this.responseText);
        alert(this.responseText)
        window.location.replace("admin.php");
    };
    xhr.send(data);
}
function login() {

    username = document.getElementById('username').value
    password = document.getElementById('password').value

    var data = new FormData();
    data.append('username', username);
    data.append('password', password);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../../src/auth/register.php', true);
    xhr.onload = function () {
        // do something to response
        console.log(this.responseText);
        alert(this.responseText)
    };
    xhr.send(data);

}
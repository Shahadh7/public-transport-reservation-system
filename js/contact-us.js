function submitForm() {
    event.preventDefault();

    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var message = document.getElementById("message").value;

    if(name == "") {
        document.getElementById("name-error").innerHTML = "Name cannot be empty!";
        return;
    }
    if(email == "") {
        document.getElementById("email-error").innerHTML = "Email cannot be empty!";
        return;
    }
    if(message == "") {
        document.getElementById("message-error").innerHTML = "Message cannot be empty!";
        return;
    }

    var nameError = document.getElementById("name-error").innerHTML;
    var emailError = document.getElementById("email-error").innerHTML;
    var messageError = document.getElementById("message-error").innerHTML;

    if(nameError != "" || emailError != "" || messageError != "") {
        return;
    }


    var confirmBox = confirm("Are you sure you want to send?");
    if (confirmBox == true) {

        var xhr = new XMLHttpRequest();
        
        var data = new FormData();
        data.append('name', name);
        data.append('email', email);
        data.append('message', message);

        xhr.open('POST', '../../src/contact-us/contact_us.php', true);
        xhr.onload = function () {
            var response = this.responseText;
            if(response == '"success"') {
                alert("Message has been sent successfully.Our admin team will contact you soon!");
                document.getElementById("name").value ="";
                document.getElementById("email").value ="";
                document.getElementById("message").value="";
            }
        };
        xhr.send(data);   
    } else {
        return;
    }
}

function nameValidation() {
    var text = document.getElementById("name").value;

    if(text.length == 0) {
        document.getElementById("name-error").innerHTML = "Name cannot be empty!"
        return;
    }
    if(text.length < 3) {
        document.getElementById("name-error").innerHTML = "Name must be atleast 3 characters!"
        return;
    }
    if(text.length >0){
        document.getElementById("name-error").innerHTML = ""
        return;
    } 
}

function emailVal() {
    var text = document.getElementById("email").value;

    var mailformat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if(text.length == 0) {
        document.getElementById("email-error").innerHTML = "Email cannot be empty!"
    }
    if(!text.match(mailformat)) {
        document.getElementById("email-error").innerHTML = "Email must be a valid email!"
    }else {
        document.getElementById("email-error").innerHTML = ""
    }
}

function messageValidation() {
    var text = document.getElementById("message").value;

    if(text.length == 0) {
        document.getElementById("message-error").innerHTML = "Message cannot be empty!"
        return;
    }
    if(text.length < 10) {
        document.getElementById("message-error").innerHTML = "Message must be atleast 10 characters!"
        return;
    }
    if(text.length > 0){
        document.getElementById("message-error").innerHTML = ""
        return;
    } 
}
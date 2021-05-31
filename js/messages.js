function getAllMessages() {
    event.preventDefault();
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../../src/messages/list_messages.php', true);
    xhr.onload = function () {
        var response = this.response;

        try {
            var json_array = JSON.parse(response);
            var output = "";

            for(var i in json_array) {
                output += "<tr id="+`${i}`+">"+
                                "<td class='row-data'>"+json_array[i].name+"</td>"+
                                "<td class='row-data'>"+json_array[i].email+"</td>"+
                                "<td class='row-data'>"+json_array[i].message+"</td>"+
                                "<td class='row-data'>"+"<img"+" src="+"'../images/delete.png'"+ "alt="+"'delete-icon'"+" class="+"'operation-icons'"+"onclick="+"'deleteMessage("+`${json_array[i].message_id}`+")'"+""+">"+"</td>"
                            +"</tr>";            
            }
            document.getElementById("message-table-body").innerHTML = output;  

        } catch (error) {
            console.log(error)
        }
    };
    xhr.send();
}

function deleteMessage(id) {
    var confirmBox = confirm("Are you sure you want to delete?");
    if (confirmBox == true) {
        var xhr = new XMLHttpRequest();
        var data = new FormData();
        data.append('message_id', id);
        xhr.open('POST', '../../src/messages/delete_message.php', true);
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
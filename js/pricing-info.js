function getaAllPricingInfo() {
    event.preventDefault();
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../../src/pricing-info/pricing_info.php', true);
    xhr.onload = function () {
        var response = this.response;

        try {
            var json_array = JSON.parse(response);
            var output = "";

            for(var i in json_array) {
                output += "<div class='pricing-card'"+">"+
                                "<h2 >"+`${json_array[i].name}`+"</h2>"+
                                "<h3>"+`${json_array[i].type}`+"</h3>"+
                                "<p class='p-bg'><span>"+`LKR ${json_array[i].price}`+"<span></p>"+
                                "<p class='p-bg'><span>"+`${json_array[i].location_from} - ${json_array[i].location_to}`+"<span></p>"+ "</div>"
                                ;              
            }
            document.getElementById("pricing-container").innerHTML = output;  

        } catch (error) {
            console.log(error)
        }
    };
    xhr.send();
}
var source;
$(document).ready( function () {

    // $.ajax({
    //     url: "https://wt78.fei.stuba.sk/zadanie5/controllers/reset.php",
    //     type: "get",
    //     async: false,
    //     // success: displayMessage
    // });


    source = new EventSource("./controllers/generator.php");
    source.onmessage = function(event) {
        document.getElementById("section_main").innerHTML += event.data + "<br>";
    };
} );

function reset()
{
    $.get("https://wt78.fei.stuba.sk/zadanie5/controllers/reset.php", displayMessage );
}

function displayMessage(response)
{
    if($('#uploader_div').css('display') != 'none')
        $('#uploader_div').hide('slow');
    var message = $('<div class="alert alert-error error-message" style="display: none;">');
    var close = $('<button type="button" class="close" data-dismiss="alert">&times</button>');
    message.append(close); // adding the close button to the message
    message.append(response);
    message.appendTo($('body')).fadeIn(300).delay(3000).fadeOut(1500);
}

var isRunning = 0;
function prepareParams()
{
    let data = $('#prepare-div').serializeArray();

    var serializedObj = {};
    serializedObj["a"] = data[data.length-2]["value"];
    serializedObj["client_id"] = data[data.length-1]["value"];
    // client_id

    $("#prepare-div input:checkbox").each(function(){
        serializedObj[this.name] = this.checked ? 1 : 0;
    });
    console.log(serializedObj);

    $.ajax({
        url: 'https://wt78.fei.stuba.sk/zadanie5/controllers/params.php',
        type: 'POST',
        data: serializedObj,
        dataType: 'text',
        success: function(data){
            displayMessage(data)
        },
    });
}

function startSource()
{

}
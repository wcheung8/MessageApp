var evtSource = new EventSource("update.php");

evtSource.onmessage = function(e) {
}

evtSource.onerror = function(e) {
    alert("EventSource failed.");
};

evtSource.addEventListener("update", function(e) {
 var newElement = document.createElement("li");       
 var obj = JSON.parse(e.data);
 newElement.innerHTML = obj.newMessage;
 $('#chat_panel').append(newElement);
}, false);

$('#message_form').submit(function(e){
    e.preventDefault();
    var message = $('#chat_box').val();

    $.ajax({
        type: 'POST',
        dataType: 'json',
        data: message,
        url: 'send_message.php',
        beforeSend: function(){

        },
        success: function(){
            $('#chat_box').val("");
        }
    });
    return false;
});
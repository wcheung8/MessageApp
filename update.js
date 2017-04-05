var evtSource = new EventSource("test.php");

evtSource.onmessage = function(event) {
}

evtSource.addEventListener("update", function(event) {
    var newElement = document.createElement("li");       
    var obj = JSON.parse(event.data);
    newElement.innerHTML = obj.newMessage;
    $('#chatBox').append(newElement);
}, false);

current_user = ""

// Send message to the server using AJAX call
function sendMsg(form) {

	if (form.msg.value.trim() == "") {
		alert("Empty message!");
	}

	// Init http object
	var http = false;
	if (typeof ActiveXObject != "undefined") {
		try {
			http = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (ex) {
			try {
				http = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (ex2) {
				http = false;
			}
		}
	} else if (window.XMLHttpRequest) {
		try {
			http = new XMLHttpRequest();
		} catch (ex) {
			http = false;
		}
	}

	if (!http) {
		alert("Unable to connect!");
		return;
	}

	// Prepare data
	var parameters = "msg=" + encodeURIComponent(form.msg.value.trim()) + "&to_user=" + encodeURIComponent(current_user);

	http.onreadystatechange = function () {
		if (http.readyState == 4 && http.status == 200) {
			if (typeof http.responseText != "undefined") {
				var result = http.responseText;
				form.msg.value = "";
			}
		}
	};

	http.open("POST", form.action, true);
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.send(parameters);

	return false;
}

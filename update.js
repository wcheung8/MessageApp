if (!!window.EventSource) {
	// Subscribe to url to listen
	var source = new EventSource('./update.php');

	// Define what to do when server sent new event
	source.addEventListener("update", function(event) {
		var el = document.getElementById("chatbox"); 
        var obj = JSON.parse(event.data);
		el.innerHTML += '<' + obj.timestamp + '> ' + obj.user + ': ' + obj.msg + "<br/>";
		el.scrollTop += 50;
	}, false);
} else {
	alert("Your browser does not support EventSource!");
} 



// Send message to the server using AJAX call
function sendMsg(form, user, current_user, timestamp) {

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
	var parameters = "msg=" + encodeURIComponent(form.msg.value.trim()) + "&to=" + encodeURIComponent(user);
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
    
    var el = document.getElementById("chatbox");
    el.innerHTML += '<' + timestamp + '> ' + current_user + ': ' + msg.value.trim() + "<br/>";
    el.scrollTop += 50;

	return false;
}


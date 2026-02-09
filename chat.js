let chatHeader = document.getElementById('chatHeader');
chatHeader.innerText = `Chat with ${getChatPartner()}`;
function getChatPartner() {
	const url = new URL(window.location.href);
	const queryParams = url.searchParams;
	const friendValue = queryParams.get('friend');
	return friendValue;
}

window.setInterval(function () {
	loadChat();
}, 1000);
loadChat();

async function loadChat() {
	let chatPartner = getChatPartner();
	let messages = await getMessages(chatPartner);
	let chat = document.getElementById('chat');
	chat.innerHTML = '';
	for (let message of messages) {
		chat.innerHTML += `<div>
				                <div>
					                <span>${message.from}: </span>
					                <span>${message.msg}</span>
				                </div>
				                <span>${formatToHHmmss(message.time)}</span>
			                </div>`;
	}
}

function formatToHHmmss(timestamp) {
	const date = new Date(timestamp);
	return [
		date.getHours().toString().padStart(2, '0'),
		date.getMinutes().toString().padStart(2, '0'),
		date.getSeconds().toString().padStart(2, '0'),
	].join(':');
}

function sendMessage() {
	let messageField = document.getElementById('message-text');
	let message = messageField.value;
	let friend = getChatPartner();
	let xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 204) {
			console.log('done...');
			messageField.value = '';
		}
	};
	xmlhttp.open('POST', 'ajax_send_message.php', true);
	xmlhttp.setRequestHeader('Content-type', 'application/json');
	let data = {
		msg: message,
		to: friend,
	};

	let jsonString = JSON.stringify(data); // Serialize as JSON
	xmlhttp.send(jsonString); // Send JSON-data to server
}

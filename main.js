window.backendURL = 'https://online-lectures-cs.thi.de/chat/c0c4f1af-179d-494a-bd42-b4c38186d7fe';
window.token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjoiSmVycnkiLCJpYXQiOjE3NjM1NTM3NjN9.XOoqRl33FCIlt97sUI9AVxH3mLdfAq9SL-nclTfy414';

function getUsers() {
	return new Promise((resolve, reject) => {
		const xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function () {
			if (xmlhttp.readyState === 4) {
				if (xmlhttp.status === 200) {
					resolve(JSON.parse(xmlhttp.responseText));
				} else {
					reject(xmlhttp.status);
				}
			}
		};
		//console.log(backendURL + token);
		//	Chat	Server	URL	und	Collection	ID	als	Teil	der	URL
		xmlhttp.open('GET', backendURL + '/user', true);
		//	Das	Token	zur	Authentifizierung,	wenn	notwendig
		xmlhttp.setRequestHeader('Authorization', 'Bearer ' + token);
		xmlhttp.send();
	});
}

function userExists(user) {
	return new Promise((resolve, reject) => {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function () {
			if (xmlhttp.readyState == 4) {
				if (xmlhttp.status == 204) {
					resolve(true);
				} else if (xmlhttp.status == 404) {
					resolve(false);
				} else {
					reject('Serverfehler');
				}
			}
		};
		xmlhttp.open('GET', backendURL + '/user/' + user, true);
		xmlhttp.send();
	});
}

function getFriendList() {
	return new Promise((resolve, reject) => {
		let xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function () {
			if (xmlhttp.readyState == 4) {
				if (xmlhttp.status == 200) {
					resolve(JSON.parse(xmlhttp.responseText));
				} else {
					reject(xmlhttp.status);
				}
			}
		};
		xmlhttp.open('GET', 'ajax_load_friends.php', true);
		xmlhttp.setRequestHeader('Content-type', 'application/json');
		xmlhttp.send();
	});
}

function getMessages(friend) {
	return new Promise((resolve, reject) => {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function () {
			if (xmlhttp.readyState == 4) {
				if (xmlhttp.status == 200) {
					resolve(JSON.parse(xmlhttp.responseText));
				} else {
					reject(xmlhttp.status);
				}
			}
		};

		xmlhttp.open('GET', `ajax_load_messages.php?to=${encodeURIComponent(friend)}`, true);
		// Add token, e. g., from Tom
		xmlhttp.send();
	});
}

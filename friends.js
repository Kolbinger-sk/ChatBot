/*function fillDatalist() {
      getUsers(function(users) {
              for(let user of users) {
                if(user !== "Jerry") {
                  let option = document.createElement("option");
                  option.innerText = user;
                  document.getElementById("friend-selector").appendChild(option);
              }
      }
      });
    }*/

/* function addFriend(user) {
      var valid = true;
      userExists("Tom", function(exists) {
        if(exists) {
          valid = false;
        };
      });

      getFriendList(function(friendlist) {
        for(let friend of friendlist) {
          if(friend.username === user) {
            valid = false;
            break;
          }
        }
      });
      console.log(valid)

    }*/

async function fillDataList() {
	let users = await getUsers();
	let friends = await getFriendList();
	friends = friends.map((obj) => obj.username);
	for (let user of users) {
		if (!friends.includes(user)) {
			let option = document.createElement('option');
			option.innerText = user;
			document.getElementById('friend-selector').appendChild(option);
		}
	}
}
async function updateDataList() {
	let datalist = document.getElementById('friend-selector');
	datalist.innerHTML = '';
	await fillDataList();
}

window.setInterval(function () {
	loadFriends();
}, 1000);
loadFriends();

async function loadFriends() {
	let friends = await getFriendList();
	let ulFriendlist = document.getElementById('friend-list');
	let olFriendrequests = document.getElementById('friend-requests');
	ulFriendlist.innerHTML = '';
	olFriendrequests.innerHTML = '';
	for (let friend of friends) {
		if (friend.status === 'accepted') {
			let li = document.createElement('li');
			let a = document.createElement('a');
			a.innerHTML = `<span>${friend.username}</span><span>${friend.unread}</span>`;
			li.appendChild(a);
			ulFriendlist.appendChild(li);
			a.setAttribute('href', 'chat.php?friend=' + friend.username);
		} else {
			let li = document.createElement('li');
			li.innerHTML = `<div class="flex-friendlist">
                            <div>
                              <span>Friend request from <b>${friend.username}</b></span>
                            </div>
                            <form method="POST">
                              <input type="hidden" name="friendName" value="${friend.username}">
                              <button type="submit" name="action" value="accept" >Accept</button>
                              <button type="submit" name="action" value="reject" >Reject</button>
                            </form>
                          </div>`;
			olFriendrequests.appendChild(li);
		}
	}
}

document.addEventListener('DOMContentLoaded', fillDataList);

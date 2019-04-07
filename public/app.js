if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/sw.js')
        .then(function () {
            console.log('Service Worker Registered');
        });
}

var messagesRef = firebase.database().ref('messages');

//save messages
function saveMessages(token) {
    var newMessageRef = messagesRef.push();
    newMessageRef.set({
        token:token
    })

}

const messaging = firebase.messaging();
messaging.requestPermission()
    .then(function () {
        console.log('Notification permission granted.');
        return messaging.getToken();
    })
    .then(function (token) {
        saveMessages(token);
        console.log(token);
    })
    .catch(function (err) {
        console.log('Unable to get permission to notify.', err);
    });

function subscribeTokenToTopic(token, topic) {
    fetch('https://iid.googleapis.com/iid/v1/AAAAFtKD6Fo:APA91bHwDuXZDZ65ppcSYXRZIcsejARkFw0L6yZxS9pEDXV7VuqcxJb5pLg541FCjZpBG4pngukyNKGVS2G2wSbyUY4L9tl3Vlrqx-cSkKbIU9z3qdr3uGJjV5QQ3IbF1MuG6vsXdB0f/rel/topics/all', {
        method: 'POST',
        headers: new Headers({
            Authorization:key='AIzaSyDDnKvi7GudJeLxswkpq4jITPYwSeek-W8'
    })
    }).then(response => {
        if (response.status < 200 || response.status >= 400) {
            throw 'Error subscribing to topic: '+response.status + ' - ' + response.text();
        }
        console.log('Subscribed to "all"');
    }).catch(error => {
        console.error(error);
    })
}
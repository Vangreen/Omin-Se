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
        saveMessages(token);
    })
    .then(function (token) {
        saveMessages(token);
        console.log(token);
    })
    .catch(function (err) {
        console.log('Unable to get permission to notify.', err);
    })
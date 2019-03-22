importScripts('https://www.gstatic.com/firebasejs/5.5.6/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/5.5.6/firebase-messaging.js');
var config = {
    apiKey: "AIzaSyDDnKvi7GudJeLxswkpq4jITPYwSeek-W8",
    authDomain: "omin-se.firebaseapp.com",
    databaseURL: "https://omin-se.firebaseio.com",
    projectId: "omin-se",
    storageBucket: "omin-se.appspot.com",
    messagingSenderId: "98021140570"
};
firebase.initializeApp(config);
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
    const title = 'Hello World';
    const options = {
        body: payload.data.body
    };
    return self.registration.showNotification(title, options);
});
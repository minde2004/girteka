importScripts('https://www.gstatic.com/firebasejs/6.0.4/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/6.0.4/firebase-messaging.js');

// Initialize the Firebase app in the service worker by passing in the
// messagingSenderId.
var firebaseConfig = {
    apiKey: "AIzaSyB5EaxCrZaam3M2ZLVoC9q7wu9niiG5dWU",
    authDomain: "notifikation-test.firebaseapp.com",
    databaseURL: "https://notifikation-test.firebaseio.com",
    projectId: "notifikation-test",
    storageBucket: "notifikation-test.appspot.com",
    messagingSenderId: "365348720859",
    appId: "1:365348720859:web:6a2adaf37eb8e65b"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);


// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();
/*
messaging.setBackgroundMessageHandler(function(payload) {
  console.log('[firebase-messaging-sw.js] Received background message ', payload);
  // Customize notification here
  const notificationTitle = 'Background Message Title';
  const notificationOptions = {
    body: 'Background Message body.'
  };

  return self.registration.showNotification(notificationTitle,
      notificationOptions);
});*/
@extends('layouts.app')

@section('content')
<div id="token"></div>
    <div id="msg"></div>
    <div id="notis"></div>
    <div id="err"></div>
	<script src="https://www.gstatic.com/firebasejs/6.0.4/firebase.js"></script>
    
    <script>
	
	
	const check = () => {
  if (!('serviceWorker' in navigator)) {
    //alert('No Service Worker support!')
  }
  if (!('PushManager' in window)) {
    //alert('No Push API Support!')
  }
  //alert('Atejo')
}

const main = () => {
  check()
}

main()
        MsgElem = document.getElementById("msg")
        TokenElem = document.getElementById("token")
        NotisElem = document.getElementById("notis")
        ErrElem = document.getElementById("err")
        // Initialize Firebase
        // TODO: Replace with your project's customized code snippet
        <!-- The core Firebase JS SDK is always required and must be listed first -->


<!-- TODO: Add SDKs for Firebase products that you want to use     https://firebase.google.com/docs/web/setup#config-web-app -->

  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyArrBGfCi_4tx9n2H4zSRc21ufznnMVJ08",
    authDomain: "push-notifications-478aa.firebaseapp.com",
    databaseURL: "https://push-notifications-478aa.firebaseio.com",
    projectId: "push-notifications-478aa",
    storageBucket: "push-notifications-478aa.appspot.com",
    messagingSenderId: "468329986962",
    appId: "1:468329986962:web:52df6e1677cd2069"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);


        const messaging = firebase.messaging();
        messaging
            .requestPermission()
			.then(function () {
                MsgElem.innerHTML = "Notification permission granted." 
                console.log("Notification permission granted.");

                // get the token in the form of promise
                return messaging.getToken()
            })
            .then(function(token) {
                $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': '{{ csrf_token() }}'
                  }
				});
				jQuery.ajax({
					url: "{{ url('/home/setkey') }}",
					method: 'post',
					data: {
						'keys': token
					},
					success: function(result){
						
						res = JSON.parse(result);
						console.log(res);
						/*if(res.status){
							$("#user_"+res.id+" td.on_off").html('<span class="label label-success">Aktyvus</span>');
							$("#user_"+res.id+" a.on_off").html('Išjungti');
						} else {
							$("#user_"+res.id+" td.on_off").html('<span class="label label-danger">Išjungtas</span>');
							$("#user_"+res.id+" a.on_off").html('Įjungti');
						}*/
					}
				});
            })
            .catch(function (err) {
                ErrElem.innerHTML =  ErrElem.innerHTML + "; " + err
                console.log("Unable to get permission to notify.", err);
            });

       /* messaging.onMessage(function(payload) {
            console.log("Message received. ", payload);
            NotisElem.innerHTML = NotisElem.innerHTML + JSON.stringify(payload) 
        });*/
    </script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

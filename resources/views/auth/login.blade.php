<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Chat Application</title>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=email], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<h2>Login Here!</h2>

<form>
{{ csrf_field() }}
  <div class="imgcontainer">
  </div>
  <div class="container">
    <label for="uname"><b>User Email</b></label>
    <input type="email" placeholder="Enter Email" id="email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" id="password" name="password" required>
        
    <button id="loginbtn"> Login </button>
  </div>

</form>

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.0.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>

  var firebaseConfig = 
  {
    apiKey: "AIzaSyDxAmGFrYHaThbHKFmC_R5YrEsQv1qGsyk",
    authDomain: "laravelchatdemo.firebaseapp.com",
    databaseURL: "https://laravelchatdemo.firebaseio.com",
    projectId: "laravelchatdemo",
    storageBucket: "laravelchatdemo.appspot.com",
    messagingSenderId: "896279278176",
    appId: "1:896279278176:web:05138d2917e691f1c40905",
    measurementId: "G-STRRGZ54NT"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

  let loginbtn=document.getElementById('loginbtn');

  loginbtn.addEventListener('click',e=>
  {

    e.preventDefault();
    const email=$("#email").val().toString();
    const password = $("#password").val().toString();
    console.log(email);
    console.log(password);
    
    firebase.auth().signInWithEmailAndPassword(email, password).then(function() 
    {
      console.log("success");
      window.location.replace("/chat");
    }, function(error) 
    {
      var errorCode = error.code;
      var errorMessage = error.message;
      console.log(errorCode);
      console.log(errorMessage);
    });
  });

</script>
</body>
</html>

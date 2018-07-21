<html lang="en">
<head>
	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Login</title>
        <link rel="icon" type="img/png" href="img/scdc_logo.png">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <style>
            body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
        </style>
</head>
<body>
            <div class="w3-modal-content w3-card-2 w3-round w3-margin-top" style="max-width:300px;">
                <div class="w3-center"><br>                   
                    <img src="img/go.jpg" alt="scdc" style="width:30%;" class="w3-circle w3-margin-top">
                </div>
<?php

if(@$_GET['p']== 'n'){
    echo '<div class="w3-panel w3-deep-orange w3-margin w3-round w3-opacity-min w3-border w3-border-red" id="message">
            <h3>Info!</h3>
            <p>password is incorrect.</p>
          </div> ';
}
?>
                <form class="w3-container" method="post" action="control/login.php">
                    <div class="w3-section">
                        <label><b>ID user</b></label>
                        <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter User" name="username" required>
                        <label><b>Password</b></label>
                        <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="password" required>
                        <button class="w3-button w3-block w3-blue w3-section w3-padding w3-round" type="submit" name="submits">Login</button>
                        <input class="w3-check w3-margin-top" type="checkbox"> Remember me
                    </div>
                </form>
                <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">                   
                    <span class="w3-right w3-padding">Forgot <a href="#">Password?</a></span>
                </div>
            </div>
<script>
$(document).ready(function(){ 
setTimeout(function() {
  $('#message').fadeOut('slow');
}, 3000);
});
</script>
</body>
</html>


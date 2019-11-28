<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>GCEAL - Login</title>
</head>
<body>
    <div id="container">
        <div id="login-container">
            <div id="login-logo-container">
                <img src="images/logo.png">
            </div>
            <div id="login-text-container">
                <div id="login-text-box-container">
                    <div class="login-text-dec" id="dec-user-name">
                        Username
                    </div>
                    <input type="text" id="username" class="text-box" onkeypress="username_keypress()">
                    <div class="login-text-dec" id="dec-user-name">
                        Password
                    </div>
                    <input type="password" id="password" class="text-box" onkeypress="login_keypress();">
                </div>
            </div>
            <div id="login-button-container">
                <div id="button-holder">
                    <input type="button" value="Forgot" id="forgot-button" class="button">
                    <input type="button" value="Login" id="login-button"  class="button" onclick="login();">
                </div>
            </div>
        </div>
        <div id="credits">
            Designed & Developed by <a href="https://www.facebook.com/teamnx/" target="_blank">Team NX</a>
        </div>
    </div>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <script type="text/javascript" src="js/core_functions.js"></script>
    <script type="text/javascript" src="js/login.js"></script>
</body>
</html>
function login(){
    var username = $element("#username").value;
    var password = $element("#password").value;
    if(!(username==null||username=='')){
        if(!(password==null||password=='')){
            req_heading=null;
            req_heading = new XMLHttpRequest();
            
            req_heading.open("POST", 'f_login.php');
            req_heading.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            var reqdata = "username=" + username+"&password="+password;
            req_heading.send(reqdata);
            
            req_heading.onreadystatechange = function() {
                if (req_heading.readyState == 4 && req_heading.status == 200){
                    if(req_heading.responseText=="logged in"){
                        window.location.replace("index.php");
                    }
                    else{
                        alert(req_heading.responseText);
                    }
                }
            }
        }
        else{
            alert("Password can't be empty!");
            $element("#password").focus();
        }
    }
    else{
        alert("Username can't be empty!");
        $element("#username").focus();
    }
}
function login_keypress(){
    var key = event.keyCode;
    if(key==13){
        login();
    }
}
function username_keypress(){
    var key = event.keyCode;
    if(key==13){
        $element("#password").focus();
    }
}
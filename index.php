
<!DOCTYPE html>
<html lang="">
<head>
<title>LOGIN</title>
<style>
h1 {text-align: center;}
.form-container {
  display: flex;
  flex-direction: column;
  align-items: center;
}

input[type="text"],
input[type="password"] {
  width: 60%;
  margin: 8px 0;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
}

button {
  width: 100%;
  margin: 8px 0;
  padding: 12px 20px;
  box-sizing: border-box;
  border: none;
  border-radius: 4px;
  background-color: #4caf50;
  color: white;
  font-size: 16px;
  cursor: pointer;
}
.signup-container {
  display: flex;
}
button2 {
  width: 40%;
  margin: 8px 0px;
  padding: 5px 10px;
  box-sizing: border-box;
  border: none;
  border-radius: 4px;
  background-color: #4caf50;
  color: white;
  font-size: 16px;
  cursor: pointer;
}
</style>
</head>
<body>
<body>  
    <div id = "frm">  
        <h1>Login</h1>  
        <form name="f1" action = "authentication.php" onsubmit = "return validation()" method = "POST">
        	<div class="form-container">
  				<input type="text" placeholder="Email" />
  				<input type="password" placeholder="Password" />
  				<div class="button-container">
    				<button title="Login">Login</button>
                    <button title="Forgot Password">Forgot Password</button>
                    <div class="form-container">
                    	<div>Not a member?</div>
 						<button2 title="Sign Up">Sign Up</button2>
                    </div>
  				</div>
			</div>
        </form>
    </div>

    <script>
            function validation()
            {
                var id=document.f1.user.value;
                var ps=document.f1.pass.value;
                if(id.length=="" && ps.length=="") {
                    alert("User Name and Password fields are empty");
                    return false;
                }
                else
                {
                    if(id.length=="") {
                        alert("User Name is empty");
                        return false;
                    }
                    if (ps.length=="") {
                    alert("Password field is empty");
                    return false;
                    }
                }
            }
        </script>
</body>
</body>
</html>


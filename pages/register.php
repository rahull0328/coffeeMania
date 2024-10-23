<?php 

    require "../assets/includes/config.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoffeeMania | Register</title>
    <link rel="stylesheet" href="../assets/css/register.css">
</head>

<body>
    <div class="container">
        <!-- code here -->
        <div class="card">
            <div class="card-image">
                <h2 class="card-heading">
                    CoffeeMania
                    <small>Let us create your account</small>
                </h2>
            </div>
            <form class="card-form" method="POST" id="registerForm">
                <div class="input">
                    <input type="text" class="input-field" autofocus id="name" name="name"  required />
                    <label class="input-label">Username</label>
                </div>
                <div class="input">
                    <input type="email" class="input-field" id="email" name="email" required  />
                    <label class="input-label">Email</label>
                </div>
                <div class="input">
                    <input type="password" class="input-field" id="password" name="password" required  />
                    <label class="input-label">Password</label>
                </div>
                <div class="action">
                    <button type="submit" class="action-button" onclick="registerUser()">Get Started</button>
                </div>
            </form>
            <div class="card-info">
                <p>Already Have An Account ?<a href="./login.php">Log In</a></p>
            </div>
        </div>
    </div>

</body>
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script>
        
            function registerUser(event){

                event.preventDefault(); // Prevent the form from submitting normally

                let data = {
                    name: $("#name").val(),
                    email: $("#email").val(),
                    password: $("#password").val(),
                }

                $.ajax({
                    url: "../api/user/registerUser.php",
                    method: "POST",
                    data: data,
                    success: function(response){
                        if(response.success){
                            alert("Registration successful!");
                            window.location.href = "./login.php";
                        }else{
                            alert(response.message);
                        }
                    },
                    error: function(error){
                        console.log(error);
                    }
                });
            }
            
            $("#registerForm").on("submit", registerUser);
    </script>
</html>

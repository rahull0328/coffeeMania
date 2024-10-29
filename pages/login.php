<?php 

require "../assets/includes/config.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Mania | Login</title>
    <link rel="stylesheet" href="../assets/css/register.css">
</head>

<body>
    <div class="container">
        <!-- code here -->
        <div class="card">
            <div class="card-image">
                <h2 class="card-heading">
                    CoffeeMania
                    <small>Welcome Back</small>
                </h2>
            </div>
            <form class="card-form" method="POST" id="loginForm">
                <div class="input">
                    <input type="text" class="input-field" autofocus name="username" required  />
                    <label class="input-label">Username</label>
                </div>
                <div class="input">
                    <input type="password" class="input-field" name="password" required />
                    <label class="input-label">Password</label>
                </div>
                <div class="action">
                    <button onclick="userLogin()" class="action-button" type="button">Get started</button>
                </div>
            </form>
            <div class="card-info">
                <p>Don't Have An Account ? <a href="<?= urlOf('pages/register.php') ?>">Create One</a></p>
            </div>
        </div>
    </div>

</body>

<script src="../assets/js/jquery-3.6.0.min.js"></script>
<script>
    function userLogin() {

        let data = {
            username: $("#username").val(),
            password: $("#password").val(),
        }

        $.ajax({
            url: "../api/user/userLogin.php",
            method: "POST",
            data: data,
            success: function(response) {
                if (response.success === true) {
                    window.location.href = '../index.php';
                    console.log(response);
                } else {
                    alert(response.message);
                    console.log(response);
                }
            },
            error: function(error) {
                alert(error.message);
                console.error(error);
            }
        })
    }
</script>
</html>

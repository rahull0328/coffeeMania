<?php
require '../../assets/includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Mania Admin | Login</title>
    <link rel="stylesheet" href="../assets/css/register.css">
</head>

<body>
    <div class="container">
        <!-- code here -->
        <div class="card">
            <div class="card-image">
                <h2 class="card-heading">
                    CoffeeMania Admin
                    <small>Welcome Back</small>
                </h2>
            </div>
            <form method="GET" class="card-form" id="loginForm">
                <div class="input">
                    <input type="text" class="input-field" autofocus name="adminName" id="username" required />
                    <label class="input-label">Username</label>
                </div>
                <div class="input">
                    <input type="password" class="input-field" name="adminPassword" id="password" required />
                    <label class="input-label">Password</label>
                </div>
                <div class="action">
                    <button class="action-button" type="submit" name="submit" id="submit">Get started</button>
                </div>
            </form>
        </div>
    </div>

</body>
<script src="../../assets/js/jquery-3.6.0.min.js"></script>
<script>
    //ajax call for admin login
    function adminLogin(event) {

        event.preventDefault();

        let data = {
            username: $('#username').val(),
            password: $('#password').val(),
        }

        console.log(data);

        $.ajax({
            url: "../../api/admin/adminLogin.php",
            method: "GET",
            data: data,
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    console.log(response);
                    alert("Welcome !");
                    window.location.href = '../index.php';
                } else {
                    alert("Error :" + response.message);
                }
            },
            error: function(error) {
                console.log(error);
                alert(error.message);
            }
        })
    }

    $("#loginForm").on("submit", adminLogin);
</script>

</html>
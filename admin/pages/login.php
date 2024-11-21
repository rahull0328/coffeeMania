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
            <form method="POST" class="card-form" id="loginForm">
                <div class="input">
                    <input type="text" class="input-field" autofocus id="username" name="username" required />
                    <label class="input-label">Username</label>
                </div>
                <div class="input">
                    <input type="password" class="input-field" id="password" name="password" required />
                    <label class="input-label">Password</label>
                </div>
                <div class="action">
                    <button class="action-button" type="button" onclick="adminLogin()" name="submit" id="submit">Get started</button>
                </div>
            </form>
        </div>
    </div>

    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script>
        function adminLogin() {

            let data = {
                username: $('#username').val(),
                password: $('#password').val(),
            }

            $.ajax({
                url: '../../api/admin/adminLogin.php',
                data: data,
                method: 'POST',
                success: function(response) {
                    if (response.status) {
                        alert('Welcome ' + response.username + '!');
                        window.location.href = '../index.php';
                        console.log(response);
                    } else {
                        alert(response.message);
                        console.log(response);
                    }
                },
                error: function(error) {
                    alert('Error occurred during login. Please try again.');
                    console.error(error);
                }
            })
        }
    </script>

</body>

</html>
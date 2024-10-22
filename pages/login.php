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
            <form class="card-form" action="" method="POST">
                <div class="input">
                    <input type="text" class="input-field" autofocus name="username" required  />
                    <label class="input-label">Username</label>
                </div>
                <div class="input">
                    <input type="password" class="input-field" name="password" required />
                    <label class="input-label">Password</label>
                </div>
                <div class="action">
                    <button class="action-button" type="submit">Get started</button>
                </div>
            </form>
            <div class="card-info">
                <p>Don't Have An Account ? <a href="./register.php">Create One</a></p>
            </div>
        </div>
    </div>

</body>

</html>
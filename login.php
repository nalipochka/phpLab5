<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body>
<?
if (isset($_POST["loginForm"])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $filePath = "users/$username.txt";

    if (file_exists($filePath)) {
       
        $serializedUser = file_get_contents($filePath);
        $user = unserialize($serializedUser);

        if ($user && $user['password'] === $password) {
            header("Location: gallery.php");
            exit;
        }
    }

    echo "Wrong username or password";
}
?>
<div class="mx-auto p-2" style="text-align:center;">
    <h1>Login</h1>
</div>
<div class="container">
        <div class="row">
            <div class="col">
                <form method="post" action="login.php">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <input type="submit"  class="btn btn-primary" value="Login" name="loginForm">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
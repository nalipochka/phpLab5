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
    if (isset($_POST["registerForm"])) {

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = array(
            'username' => $username,
            'email' => $email,
            'password' => $password
        );
        $serializedUser = serialize($user);

        $filePath = "users/$username.txt";

        file_put_contents($filePath, $serializedUser);

        header("Location: gallery.php");
        exit;
    }
    ?>
<div class="mx-auto p-2" style="text-align:center;">
    <h1>Register</h1>
</div>
    <div class="container">
        <div class="row">
            <div class="col">
                <form method="post" action="register.php">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">eMail</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <input type="submit"  class="btn btn-primary" value="Register" name="registerForm">
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <h4>Login</h4>
        <form action="includes/checklogin.php" method="post">
            <div>
                <input name="email" type="email" placeholder="Email">
            </div>
            <div>
                <input name="password" type="password" placeholder="Wachtwoord">
            </div>
            <div>
                <button name="login" type="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
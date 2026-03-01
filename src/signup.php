<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <h1>Sign Up</h1>
        <form action = "signup-script.php" method="post">
            <label for = "email">Email:</label><br />
            <input name = "email" id = "email" type = "email"><br />
            <label for = "username">Username</label><br />
            <input name = "username" id = "username" type = "text"><br />
            <label for = "password">Password:</label><br />
            <input name = "password" id = "password" type = "password"><br />
            <label for = "password-2">Password Again:</label><br />
            <input name = "password-2" id = "password-2" type = "password"><br />
            <button type="submit">Sign Up</button>
        </form>
    </main>
</body>
</html>
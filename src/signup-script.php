<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <?php
            include "connect.php";
            //check if username is in use
            $stmt = $db_handle->prepare("SELECT * FROM users WHERE name=?");
            //$stmt->bind_param("s", $_POST["username"]);
            $stmt->execute(array($_POST["username"]));
            $user_info = $stmt->fetch();
            
            if ($user_info == false) {
                //check email
                $stmt = $db_handle->prepare("SELECT * FROM users WHERE email=?");
                //$stmt->bind_param("s", $_POST["email"]);
                $stmt->execute(array($_POST["email"]));
                $user_info = $stmt->fetch();
                if ($user_info == false) {
                    //check passwords the same
                    if ($_POST["password"] == $_POST["password-2"]) {
                        //create account
                        $hashed_pwd = password_hash($_POST["password"], PASSWORD_DEFAULT);
                        $date_today = date("Y-m-d");
                        $stmt = $db_handle->prepare("INSERT INTO users (name, email, password, datejoined) VALUES (?,?,?,?); ");
                        //$stmt->bind_param("ssss", $_POST["username"], $_POST["email"],  $hashed_pwd, $date_today);
                        $stmt->execute(array($_POST["username"], $_POST["email"],  $hashed_pwd, $date_today));
                        echo "You are signed up! Thank you for playing my game, you will regret it.";
                    } else {
                        echo "<p>Your passwords do not match.</p>";
                    };
                } else {
                    echo "<p>That email is already in use. Please email me at p-t@hackclub.app if this is an issue.</p>";
                };
            } else {
                echo "<p>That username is already taken.</p>";
            };
        ?>
    </main>
</body>
</html>
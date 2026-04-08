<?php
            include "connect.php";
            $stmt = $db_handle->prepare("SELECT * FROM users WHERE name=?");
            //$stmt->bind_param("s", $_POST["username"]);
            $stmt->execute(array($_POST["username"]));
            $user_info = $stmt->fetch();
            if (password_verify($_POST["password"], $user_info["password"])) {
                /*
                echo "you're logged in as <b>";
                //session_start();
                $_SESSION["user"] = $_POST["username"];
                $_SESSION["logged_in"] = true;
                echo $_SESSION["user"];
                echo "</b>!";
                */
                echo '{"success":true,"id":"' . $user_info["id"] . '"}';
            } else {
                echo '{"success":false}';
            }
?>
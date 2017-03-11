<!DOCTYPE HTML>
<HTML>
<HEAD>
    <Title>TestMe - Log In</Title>
    <link rel="icon" type="image/x-icon" href="pics/favicon.ico" />
    <link rel="stylesheet" href="Styles/main.css" />
    <link rel="stylesheet" href="Styles/login.css" />
    <?php
    $flag_name = $flag_pw = $flag_login = 0;
    $name = $pw = '';
    if(isset($_POST['submit'])) {
        if (isset($_POST['username'])) {
            $name = $_POST['username'];
            if(isEmptyString($name)) $flag_name = 2;
            else $flag_name = 1;
        }

        if (isset($_POST['password'])) {
            $pw = $_POST['password'];
            if(isEmptyString($pw)) $flag_pw = 2;
            else $flag_pw = 1;
        }
    }

    if($flag_name == 1 && $flag_pw == 1) {
        $conn = new mysqli('localhost', 'testmeuser136', 'ECo5!sZpRF@^', 'testme1369');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $sql = "SELECT Username, Hashedpw FROM User where Username = '$name'";
        $result = $conn->query($sql);

        if (!$result === TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $pw2 = $row['Hashedpw'];
            if(crypt($pw, $pw2) == $pw2) echo "<script> window.location.assign('field.php'); </script>";
            else $flag_login = 2;
        } else {
            $flag_login = 2;
        }
        $conn->close();
    }
    function isEmptyString($str) {
        if(strlen($str) == 0) return true;
        else return false;
    }

    ?>
</HEAD>

<BODY>
<div id="header">
    <table>
        <tr>
            <td><a href="index.php"><img src="pics/favicon.ico"></a></td>
            <td><a href="index.php"><p>TestMe</p></a></td>
            <td>
                <ul>
                    <li><a href="dash.php">Dashboard</a></li>
                    <li><a href="faq.php">FAQ</a></li>
                    <li><button><a href="login.php">Log In</a></button></li>
                </ul>
            </td>
        </tr>
    </table>
</div>
<div id="login-container">
    <div id="login-content">
        <p>Welcome Back</p>
        <form action="login.php" method="post">
            <input type="text" name="username" placeholder="user name">
            <?php if($flag_name == 2) echo "* name cannot be empty"; ?><br>
            <input type="password" name="password" placeholder="password">
            <?php if($flag_pw == 2) echo "* password cannot be empty"; ?><br>
            <a>forgot my password</a><br>
            <input type="submit" value="Log In" name="submit" id="submit">
            <?php if($flag_login == 2) echo "* wrong username or password"; ?><br>
        </form>
        <a href="signup.php">Click here to get an new free account!</a>
    </div>
</div>
<div id="footer">
    <ul>
        <li><a href="info.php">Website Info</a></li>
        <li><a href="contact.php">Contact Us</a></li>
    </ul>
    <p>All rights reserved. @2017</p>
</div>
</BODY>
</HTML>
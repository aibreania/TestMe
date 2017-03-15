<!DOCTYPE HTML>
<HTML>
<HEAD>
    <Title>TestMe - Sign Up</Title>
    <link rel="icon" type="image/x-icon" href="pics/favicon.ico" />
    <link rel="stylesheet" href="Styles/main.css" />
    <link rel="stylesheet" href="Styles/signup.css" />
    <?php
    $flag_name = $flag_pw = $flag_email;
    $name = $email = $pw = $ques = $ans = '';
    if(isset($_POST['submit'])) {
        if (isset($_POST['username'])) {
            $name = strval($_POST['username']);
            if(isEmptyString($name)) $flag_name = 2;
            else $flag_name = 1;
        }

        if (isset($_POST['pw'])) {
            $pw = $_POST['pw'];
            if(isEmptyString($pw)) $flag_pw = 2;
            else if(strlen($pw) < 8) $flag_pw = 4;
            else $flag_pw = 1;
        }

        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            $flag_email = 1;
        }

        if (isset($_POST['question'])) {
            $ques = $_POST['question'];
        }

        if (isset($_POST['answer'])) {
            $ans = $_POST['answer'];
        }

    }

    if($flag_name == 1 && $flag_pw == 1 && $flag_email == 1) {
        $conn = new mysqli('localhost', 'testmeuser136', 'ECo5!sZpRF@^', 'testme1369');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $hash = crypt($pw);

        $sql_username = "SELECT Username FROM User where Username = '$name'";
        $sql_email = "SELECT Email FROM User where Email = '$email'";
        $result_username = $conn->query($sql_username);
        $result_email = $conn->query($sql_email);

        if (!$result_username === TRUE || !$result_email == TRUE) {
            echo "Error: " . "<br>" . $conn->error;
        }

        if($result_username->num_rows == 0 && $result_email->num_rows == 0) {
            $sql = "INSERT INTO User (Username, Hashedpw, Email, Question, Answer) VALUES ('$name', '$hash', '$email', '$ques', '$ans')";
            if (!$conn->query($sql) === TRUE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            echo "<script> window.location.assign('login.php'); </script>";
        } else {
            if($result_username->num_rows > 0)
                $flag_name = 3;
            if($result_email->num_rows > 0)
                $flag_email = 3;
        }

        echo "<p>hello</p>";

        $conn->close();
    }
    function isEmptyString($str) {
        if(strlen($str) == 0) return true;
        else return false;
    }

    function validPw($str) {
        if(preg_match('/[a-z]+[0-9]+/', $str)) return true;
        return false;
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
                    <li><a href="forum.php">Forum</a></li>
                    <li><a href="faq.php">FAQ</a></li>
                    <li><button><a href="login.php">Log In</a></button></li>
                </ul>
            </td>
        </tr>
    </table>
</div>
<div id="signup-container">
    <p>Only one step from becoming part of TestMe!</p>
    <div id="signup-content">
        <form action="signup.php" method="post">
            *Username: <input name="username" type="text">
            <?php
            if($flag_name == 2) echo "name cannot be empty";
            else if($flag_name == 3) echo "name already used";
            ?><br>

            *Password: <input name="pw" type="password">
            <?php
            if($flag_pw == 2) echo "password cannot be empty";
            else if($flag_pw == 4) echo "password must be more than 8 digit long";
            ?>
            <br>
            *Email: <input name="email" type="email">
            <?php
                if($flag_email == 3) echo "email already used";
            ?><br>
            Protection Question: <input name="question" type="text"><br>
            Protection Question Answer: <input name="answer" type="text"><br>
            <input type="submit" name="submit" value="Click to Sign Up">
        </form>
        <a href="field.php">Click to practice!</a>
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
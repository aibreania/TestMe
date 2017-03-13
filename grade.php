<!DOCTYPE HTML>
<HTML>
<HEAD>
    <Title>TestMe - Practice Result</Title>
    <link rel="icon" type="image/x-icon" href="pics/favicon.ico" />
    <link rel="stylesheet" href="Styles/main.css" />
    <link rel="stylesheet" href="Styles/grade.css" />
    <?php
    $total = $len = $UserId = $ChapId = -1;
    if(isset($_POST['total'])) $total = $_POST['total'];
    if(isset($_POST['len'])) $len = $_POST['len'];
    if(isset($_POST['UserId'])) $UserId = $_POST['UserId'];
    if(isset($_POST['chapId'])) $ChapId = $_POST['chapId'];

    if($total != -1 && $len != -1 && $UserId != -1 && $ChapId != -1) {
        $conn = new mysqli('localhost', 'testmeuser136', 'ECo5!sZpRF@^', 'testme1369');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO Progress (UserId, ChapId, Correct, Len) VALUES ('$UserId', '$ChapId', '$total', '$len')";
        $result = $conn->query($sql);

        if (!$result== TRUE) {
            echo "Error: " . "<br>" . $conn->error;
        }

        $conn->close();
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
<div id="grade-container">
    <div id="grade-content">
        <p>Congrats! Your score is <span id="score"><?php echo $total." / ".$len; ?></span>!</p>
        <!--<p>You have beaten % of the competitors!</p>-->
        <a href="field.php"><button>Click here to get more practices!</button></a>
    </div>
</div>
<div id="footer">
    <ul>
        <li><a href="info.php">Website Info</a></li>
        <li><a href="contact.php">Contact Us</a></li>
    </ul>
    <p>All rights reserved. @2017</p>
</div>
<form name="myform" method="post" action="grade.php">
    <input type="text" name = "var" id="total">
    <input type="text" name = "var" id="len">
    <input type="text" name = "var" id="chapId">
    <input type="text" name = "var" id="UserId">
</form>

<script>
    var UserId = sessionStorage.getItem('UserId');
    var Username = sessionStorage.getItem('Username');
    if(UserId == null || Username == null) window.location.assign('login.php');
    var loginLink = document.getElementById("loginLink");
    loginLink.innerHTML = Username;
    loginLink.href = "dash.php";
</script>
</BODY>
</HTML>
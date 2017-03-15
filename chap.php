<?php
session_save_path('/tmp');
session_start();
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
    <Title>TestMe - Choose Topics</Title>
    <link rel="icon" type="image/x-icon" href="pics/favicon.ico" />
    <link rel="stylesheet" href="Styles/main.css" />
    <link rel="stylesheet" href="Styles/chap.css" />
</HEAD>

<BODY>
<?php
$field = $field_id = '';
if(isset($_GET['field'])) $field = $_GET['field'];
if($field == 'html') $field_id = 1;
else if($field == 'css') $field_id = 2;
else if($field == 'javascript') $field_id = 3;
else if($field == 'angularjs') $field_id = 4;
else if($field == 'reactjs') $field_id = 5;
else if($field == 'jquery') $field_id = 6;

$result = '';

if($field_id != '') {
    $conn = new mysqli('localhost', 'testmeuser136', 'ECo5!sZpRF@^', 'testme1369');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT fieldId, chapterName FROM Chapter WHERE fieldId = '$field_id'";
    $result = $conn->query($sql);

    if (!$result === TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    if ($result->num_rows <= 0) {
        echo "<script> window.location.assign('field.php'); </script>";
    }
    $conn->close();
}
?>

<div id="header">
    <table>
        <tr>
            <td><a href="index.php"><img src="pics/favicon.ico"></a></td>
            <td><a href="index.php"><p>TestMe</p></a></td>
            <td>
                <ul>
                    <li><a href="forum.php">Forum</a></li>
                    <li><a href="faq.php">FAQ</a></li>
                    <li><button><a href="login.php" id="loginLink">Log In</a></button></li>
                </ul>
            </td>
        </tr>
    </table>
</div>
<div id="chap-container">
    <div id="chap-content">
        <?php
        print "<p>Choose field of $field</p>";
        $row = '';
        while($row = $result->fetch_assoc()) {
            $chap = $row['chapterName'];
            print "<a href='practice.php?chap=$chap' class='chap'>$chap</a>";
        }
        ?>
        <a href="practice.html" id="random"><button>Click here for a random test!</button></a>
    </div>
</div>
<div id="footer">
    <ul>
        <li><a href="info.php">Website Info</a></li>
        <li><a href="contact.php">Contact Us</a></li>
    </ul>
    <p>All rights reserved. @2017</p>
</div>
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
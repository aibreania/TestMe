<!DOCTYPE HTML>
<HTML>
<HEAD>
    <Title>TestMe - Log In</Title>
    <link rel="icon" type="image/x-icon" href="pics/favicon.ico" />
    <link rel="stylesheet" href="Styles/main.css" />
    <link rel="stylesheet" href="Styles/login.css" />
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
                    <li><button><a href="login.php" id="loginLink">Log In</a></button></li>
                </ul>
            </td>
        </tr>
    </table>
</div>
<div id="login-container">
    <div id="login-content">
        <p>Hi, this page is under development. Check back soon!</p>
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
    if(UserId != null && Username != null) {
    	    var loginLink = document.getElementById("loginLink");
	    loginLink.innerHTML = Username;
	    loginLink.href = "dash.php";
    }
</script>
</BODY>
</HTML>
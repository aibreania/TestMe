<!DOCTYPE HTML>
<HTML>
<HEAD>
    <Title>TestMe - User Dashboard</Title>
    <link rel="icon" type="image/x-icon" href="pics/favicon.ico" />
    <link rel="stylesheet" href="Styles/main.css" />
    <link rel="stylesheet" href="Styles/dash.css" />
    <link rel="stylesheet" href="Styles/circle.css" />
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
<div id="dash-container">
    <div id="dash-nav">
        <ul>
            <li><a href="" onclick = "settings()" class="side-link"><table><tr><td><img src="https://s3-us-west-2.amazonaws.com/react-dashboard-images/Settings.png"></td><td>User Settings</td></tr></table></a></li>
            <li><a href="" onclick = "settings()" class="side-link"><table><tr><td><img src="https://s3-us-west-2.amazonaws.com/react-dashboard-images/Card.png"></td><td>Past Tests</td></tr></table></a></li>
            <li><a href="" onclick = "settings()" class="side-link"><table><tr><td><img src="https://s3-us-west-2.amazonaws.com/react-dashboard-images/Charts.png"></td><td>Past Grades</td></tr></table></a></li>
            <li><a href="" onclick = "settings()" class="side-link"><table><tr><td><img src="https://s3-us-west-2.amazonaws.com/react-dashboard-images/User.png"></td><td>Career Analysis</td></tr></table></a></li>
            <li><a href="index.php" class="side-link" onclick="logout()"><table><tr><td><img src="https://s3-us-west-2.amazonaws.com/react-dashboard-images/Login+Page.png"></td><td>Log Out</td></tr></table></a></li>
        </ul>
    </div>
    <div id="dash-screen">
        <p>Progress So Far....</p>
        <div id="dash-circles">
            <div class="c100 p30">
                <span>30%</span>
                <div class="slice">
                    <div class="bar"></div>
                    <div class="fill"></div>
                </div>
            </div>

            <div class="c100 p60 green">
                <span>60%</span>
                <div class="slice">
                    <div class="bar"></div>
                    <div class="fill"></div>
                </div>
            </div>

            <div class="c100 p0 orange">
                <span>0%</span>
                <div class="slice">
                    <div class="bar"></div>
                    <div class="fill"></div>
                </div>
            </div>
            <div class="c100 p20 red">
                <span>20%</span>
                <div class="slice">
                    <div class="bar"></div>
                    <div class="fill"></div>
                </div>
            </div>

            <div class="c100 p50 yellow">
                <span>50%</span>
                <div class="slice">
                    <div class="bar"></div>
                    <div class="fill"></div>
                </div>
            </div>

            <div class="c100 p99 purple">
                <span>99%</span>
                <div class="slice">
                    <div class="bar"></div>
                    <div class="fill"></div>
                </div>
            </div>
        </div>
        <ul>
            <li>HTML</li>
            <li>CSS</li>
            <li>JavaScript</li>
            <li>AngularJS</li>
            <li>ReactJS</li>
            <li>jQuery</li>
        </ul>
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

    function logout(){
        sessionStorage.clear();
        window.location.assign('index.php');
    }
</script>
</BODY>
</HTML>
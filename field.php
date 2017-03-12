<?php
session_save_path('/tmp');
session_start();
?>

<!DOCTYPE HTML>
<HTML>
<HEAD>
    <Title>TestMe - Choose Field of Practice</Title>
    <link rel="icon" type="image/x-icon" href="pics/favicon.ico" />
    <link rel="stylesheet" href="Styles/main.css" />
    <link rel="stylesheet" href="Styles/field.css" />
    <script type="text/javascript" src="JS/field.js"></script>
</HEAD>

<BODY onload="loadFunction()">
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
<div id="field-container">
    <div id="field-board">
        <div class="left tab" onmouseover="showDetail(this)" onmouseout="hideDetail(this)">
            <div class="tab-content">
                <h1>HTML</h1>
                <div class="tab-detail">
                    <p>Two Topics</p>
                    <div class="progress"><div class="bar">30%</div></div>
                    <a href="chap.php?field=<?php echo 'html'; ?>"><button>Resume</button></a>
                </div>
            </div>
        </div>
        <div class="middle tab" onmouseover="showDetail(this)" onmouseout="hideDetail(this)">
            <div class="tab-content">
                <h1>CSS</h1>
                <div class="tab-detail">
                    <p>Two Topics</p>
                    <div class="progress"><div class="bar">60%</div></div>
                    <a href="chap.php?field=<?php echo 'css'; ?>"><button>Resume</button></a>
                </div>
            </div>
        </div>
        <div class="right tab" onmouseover="showDetail(this)" onmouseout="hideDetail(this)">
            <div class="tab-content">
                <h1>JavaScript</h1>
                <div class="tab-detail">
                    <p>Two Topics</p>
                    <div class="progress"><div class="bar">0%</div></div>
                    <a href="chap.php?field=<?php echo 'javascript'; ?>"><button>Resume</button></a>
                </div>
            </div>
        </div>
        <div class="left tab" onmouseover="showDetail(this)" onmouseout="hideDetail(this)">
            <div class="tab-content">
                <h1>AngularJS</h1>
                <div class="tab-detail">
                    <p>Two Topics</p>
                    <div class="progress"><div class="bar">20%</div></div>
                    <a href="chap.php?field=<?php echo 'angularjs'; ?>"><button>Resume</button></a>
                </div>
            </div>
        </div>
        <div class="middle tab" onmouseover="showDetail(this)" onmouseout="hideDetail(this)">
            <div class="tab-content">
                <h1>ReactJS</h1>
                <div class="tab-detail">
                    <p>Two Topics</p>
                    <div class="progress"><div class="bar">50%</div></div>
                    <a href="chap.php?field=<?php echo 'reactjs'; ?>"><button>Resume</button></a>
                </div>
            </div>
        </div>
        <div class="right tab" onmouseover="showDetail(this)" onmouseout="hideDetail(this)">
            <div class="tab-content">
                <h1>jQuery</h1>
                <div class="tab-detail">
                    <p>Two Topics</p>
                    <div class="progress"><div class="bar">99%</div></div>
                    <a href="chap.php?field=<?php echo 'jquery'; ?>"><button>Resume</button></a>
                </div>
            </div>
        </div>
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
<?php
session_save_path('/tmp');
session_start();
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
    <Title>TestMe - Practices Makes Perfect</Title>
    <link rel="icon" type="image/x-icon" href="pics/favicon.ico" />
    <link rel="stylesheet" href="Styles/main.css" />
    <link rel="stylesheet" href="Styles/practice.css" />
    <style>
    	#myform {
    		opacity: 0;
    		display: hidden;
    	}
    </style>
    
    <?php
    $chap = $chap_id = '';

    if(isset($_GET['chap'])) $chap = $_GET['chap'];
    else echo "no chap";

    $conn = new mysqli('localhost', 'testmeuser136', 'ECo5!sZpRF@^', 'testme1369');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql_chap = "SELECT Id, chapterName FROM Chapter WHERE chapterName = '$chap'";
    $result_chap = $conn->query($sql_chap);
    if (!$result_chap === TRUE) {
        echo "Error: " . $sql_chap . "<br>" . $conn->error;
    }
    if ($result_chap->num_rows <= 0) {
        echo "<script> window.location.assign('field.php'); </script>";
    }
    $row_chap = $result_chap->fetch_assoc();
    $chap_id = $row_chap['Id'];

    $sql_prac = "SELECT description, choices, other FROM Question WHERE chapId = '$chap_id'";
    $result_prac = $conn->query($sql_prac);
    if (!$result_prac === TRUE) {
        echo "Error: " . $sql_prac . "<br>" . $conn->error;
    }
    if ($result_prac->num_rows <= 0) {
        echo "<script> window.location.assign('field.php'); </script>";
    }

    $row_prac = '';
    $questions = array();
    $choices = array();
    $others = array();
    $rights = array();
    while($row_prac = $result_prac->fetch_assoc()) {
        array_push($questions, $row_prac['description']);
        array_push($choices, $row_prac['choices']);
        array_push($others, $row_prac['other']);
    }

    $conn->close();

    for($i = 0; $i < sizeof($choices); $i++) {
        $choice = $choices[$i];
        $choice = explode(";", $choice);
        $right = $choice[0];
        array_push($rights, $right);
        shuffle($choice);
        $choices[$i] = $choice;
    }

    $used = array();

    $questions_json = json_encode($questions);
    $choices_json = json_encode($choices);
    $others_json = json_encode($others);
    $rights_json = json_encode($rights);

    ?>
    <script>
        var UserId = sessionStorage.getItem('UserId');
	var Username = sessionStorage.getItem('Username');
	
        var questions = JSON.parse('<?= $questions_json; ?>');
        var choices = JSON.parse('<?= $choices_json; ?>');
        var others = JSON.parse('<?= $others_json; ?>');
        var rights = JSON.parse('<?= $rights_json; ?>');
        var chap_id = "<?php echo $chap_id; ?>";
        var used = [];
	var choice, right,total = 0;
        //for(var i = 0; i < questions.length; i++) console.log(questions[i]);

        function nextQuestionNo() {
            if(used.length == questions.length) return -1;
            var r = Math.floor(Math.random()*questions.length);
            while(used.indexOf(r) != -1) r = Math.floor(Math.random()*questions.length);
            used.push(r);
            return r;
        }

        function newQuestion(){
            if(used.length == questions.length-1) {
            	var button = document.getElementById("button");
            	button.innerHTML = "Check Grade";	
            }
            
            var form = document.getElementById("form");
            var n = nextQuestionNo();
            
            while (form.hasChildNodes()) {
                var child = form.lastChild;
                if(child.checked && child.value == right) {
                	total++;
                }
                if(n == -1) {
		    document.getElementById("total").value = total;
	            document.getElementById("len").value = used.length;
	            document.getElementById("chapId").value = chap_id;
                    document.getElementById("UserId").value = UserId;
		    document.myform.submit();
	            //window.location.assign('grade.php');
	            return;
	        }
            	form.removeChild(child);
            }
            
            choice = choices[n];
            right = rights[n];
            document.getElementById("question").innerHTML =  used.length + "." + questions[n];
  
	    for(var i = 0; i < choice.length; i++) {
                var input = document.createElement("INPUT");
                input.type = "radio";
                input.value = choice[i];
                input.name = "one";
                form.appendChild(input);
                form.appendChild(document.createTextNode(choice[i]));
                form.appendChild(document.createElement("br"));
            }

        }
    </script>
</HEAD>

<BODY onload="newQuestion()">
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
<div id="prac-container">
    <div id="prac-content">
        <p id="question">Your answers are complete.</p>
        <div id="form"></div>
        <button onClick='newQuestion()' id='button'>Next Question</button>
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
   <input type="hidden" name = "total" id="total">
   <input type="hidden" name = "len" id="len">
   <input type="hidden" name = "chapId" id="chapId">
   <input type="hidden" name = "UserId" id="UserId">
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
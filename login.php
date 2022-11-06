<?php

session_start();
session_destroy();
session_start();
require_once "pdo.php";
?>
<?php
if (isset($_POST['cancel'])) {
    
    header("Location: index.php");
    return;
}
if (isset($_POST['pwd']) && isset($_POST['name'])) {
    $stmt = $pdo->prepare('SELECT name, pwd, type, college FROM name WHERE name = :u AND pwd = :p');
    $stmt->execute(array(':u' => $_POST['name'], ':p' => $_POST['pwd']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row !== false) {
        $_SESSION['name'] = $row['name'];
        $_SESSION['pwd'] = $row['pwd'];
        $_SESSION['type'] = $row['type'];
        $_SESSION['college'] = $row['college'];
        $_SESSION['smoking'] = $row['smoking'];  
        $_SESSION['going-out'] = $row['going-out'];
        $_SESSION['guests'] = $row['guests'];
        $_SESSION['party'] = $row['party'];

        if ($row['type'] < 2) {
        header("Location: index1.php");
        }
        else {
        header("Location: index2.php");
        }
        return;
    }
    else{
        $_SESSION['error']="Invalid name or pwd.";
        header("Location:login.php");
        return;
    }

}
#Some css (Design) taken from W3schools.com and https://codepen.io/P1N2O/pen/pyBNzX Functionality and backend is all self-coded
?>
<!DOCTYPE html>
<html>
<head>

    <title>Welcome</title>
</head>
<body id="loginpagebody">

<div class="container">
    <h1 id="loginheadingortitle">Please Log In</h1>
    <h2> </h2>
    <?php
    if (isset($_SESSION['error'])) {
        echo('<p style="color: red;">' . htmlentities($_SESSION['error']) . "</p>\n");
        unset($_SESSION['error']);
    }
    ?>
    <form method="POST" action="login.php">
        User Name <input type="text" name="name" id="logininput"><br/>
        Passcode <input type="text" name="pwd" id="logininput"><br/>
        <input type="submit" value="Log In" id="login">
        <input type="submit" name="cancel" value="Cancel" id="login">
    </form>
<style> 

h1{ font-size: 100px; }
h2{font-size: 50px; font-style: italic;}

input {
  border-radius: 25px;
  background: white;
  padding: 20px;
  width: 450px;
  height: 15px;
  margin: 20px;
  -webkit-box-shadow: 0 2px 10px 1px rgba(0,0,0,0.5);
  box-shadow: 0 2px 10px 1px rgba(0,0,0,0.5);

}
input:hover
{opacity: 0.5;
}
#login:hover
{
opacity: 1;
    background: blue;
}
body {
    background-image: url('https://pbs.twimg.com/media/Ct8sxeDWAAASWAG.jpg');
    background-size: cover;
    height: 100vh;
    padding:0;
    margin:0;
    font-size: ;
    color:  white;
    text-align: center;
}
    

</style>
</div>
</body>
</html>

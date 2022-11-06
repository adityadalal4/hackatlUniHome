<?php

session_start();
require_once "pdo.php";
if (isset($_POST['cancel'])) {
    
    header("Location: index2.php");
    return;
}

?>
<!DOCTYPE html>
<html>
<head>
    
    <title>Welcome</title>
</head>
<body id="loginpagebody">
<div class="container">
    <h1 id="loginheadingortitle">Please enter data </h1>
    <form method="POST" action="add.php">
        Apartment Name <input type="text" name="apartment" id="logininput"><br/>
        Info (Reviewed for address, cost, amenities, smoking) <input type="text" name="info" id="logininput"><br/>
        <input type="file" id="myFile" name="image">
        <input type="submit" value="Add" id="logininput">
        <input type="submit" name="cancel" value="Cancel" id="logininput">
    </form>
  
</div>
</body>
</html>
<?php
if (isset($_POST['apartment']) && isset($_POST['info']) && isset($_POST['image'])) {

    $stmt = $pdo->prepare('INSERT INTO apartment (name, apartment, info, college, image) VALUES (:a, :b, :c, :d, :e)');
    $stmt->execute(array(':a' => $_SESSION['name'],':b' => $_POST['apartment'],':c' => $_POST['info'], ':d' => $_SESSION['college'], ':e' => $_POST['image']));
    $_POST['apartment']="";
    $_POST['info']="";
    $_SESSION['success']="Data added (Will be reviewed in pilot)";

}
#Some css (Design) taken from W3schools.com and https://codepen.io/P1N2O/pen/pyBNzX Functionality and backend is all self-coded
?>
<style>
    input {
  border-radius: 25px;
  background: white;
  padding: 20px;
  width: 450px;
  height: 15px;
  margin: 20px;
  -webkit-box-shadow: 0 10px 10px 10px rgba(0,0,0,0.5);
  box-shadow: 0 10px 10px 1px rgba(0,0,0,0.5);

}
    body {
    height: 100vh;
    padding:0;
    margin:0;
    font: 100 px;
    color:  white;
    text-align: center;
    
    
    
    background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
    background-size: 400% 400%;

    
}
table, td {
  border: 1px solid black;
  text-align: center;
  margin: 100px;
}
img{
    height: 500px;
    width: 500px;
}
input{
    border-radius: 10px;
    opacity:0.7 ;
}
input:hover
{
opacity: 1;
background: blue;
}
</style>
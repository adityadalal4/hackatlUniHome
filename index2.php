<?php
session_start();
require_once "pdo.php";
if(isset($_POST['Logout'])){
	header("Location:logout.php");
}
if(isset($_POST['Add'])){
    header("Location:add.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body id="loginpagebody">
<div class="container">
    
    <h1 id="loginheadingortitle">Posted Apartments</h1>
    <form method="POST">
        <input type="submit" name="cancel" value="Cancel" id="logininput" formaction="logout.php">
        <input type="submit" name="submit" value="Add" id="logininput" formaction="add.php">
    </form>
<style>
 img {
    float: left;
    width:  10px;
    height: 10px;
}  
</style> 
</div>
</body>
</html>
<?php
if (isset($_SESSION['pwd']) && isset($_SESSION['name']) && isset($_SESSION['college'])) {
   $stmt = $pdo->prepare('SELECT * FROM apartment WHERE name = :u');
    $stmt->execute(array(':u' => $_SESSION['name']));
    echo("<body><table>");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {       
        echo('<tr><td><a href="info.php?apartment='.$row['apartment'].'"><img src="'.$row['image']."\"></a></td><td></td><td>".$row['name']."</a></td><td></td><td></td><td>".$row['apartment']."</td><td></td><td></td><td>".$row['info']."</td></tr>");
    }
    echo("</table></body>");
// Fall through into the View
}
else{
	header("Location: login.php");
}
#Some css (Design) taken from W3schools.com and https://codepen.io/P1N2O/pen/pyBNzX Functionality and backend is all self-coded
?>


<style>
    
    body {
    height: 100vh;
    padding:0;
    margin:0;
    font: 100 px;
    color:  white;
    text-align: center;
    background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
    background-size: 400% 400%;
    animation: gradient 15s ease infinite;
    height: 100vh;
    background-color: #ADD8E6;
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
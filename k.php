<?php
session_start();
require_once "pdo.php";
if(isset($_POST['Logout'])){
    header("Location:logout.php");
}
if(isset($_POST['Cancel'])){
    header("Location:index1.php");
}
if (isset($_SESSION['college'])) {
    $stmt = $pdo->prepare('SELECT * FROM name WHERE college = :u');
    $stmt->execute(array(':u' => $_SESSION['college'])); 
    $a=array();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        if($row['name']!==$_SESSION['name'] && $row['type']==1)
        {
        $A=pow(pow(($_SESSION['smoking'] - $row['smoking']),2) + 
        pow (($_SESSION['going-out'] - $row['going-out']),2) +
        pow (($_SESSION['guests'] - $row['guests']),2) +
        pow (($_SESSION['party'] - $row['party']),2),(1/2));

        if($A<0.2){
            array_push($a,'<h1><a href="mailto:'.$row['email'].'">'.$row['name'].'</a>: '.$row['phone'].'</h1>');
        }

        }
    }
    echo("Matches:<br>");
    for($i=0;$i<count($a);$i++)
    {
        echo($a[$i]);
    }
    

}
#Some css (Design) taken from W3schools.com and https://codepen.io/P1N2O/pen/pyBNzX Functionality and backend is all self-coded
?>

<html><form method="POST" action="k.php">
        <input type="submit" name="cancel" value="Cancel" id="logininput" formaction="index1.php">
        <input type="submit" name="roommate" value="Logout" id="logininput" formaction="logout.php">
    </form> </html>
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
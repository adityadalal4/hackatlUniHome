<?php
session_start();
require_once "pdo.php";
if (isset($_POST['cancel'])) {
    // Redirect the browser to game.php
    header("Location: index1.php");
    return;
}
if(isset($_POST['Logout'])){
	header("Location:logout.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body id="loginpagebody">
<div class="container">
    <h1 id="loginheadingortitle">Postings near <?php echo($_SESSION['college']); ?> </h1>
    <form method="POST" action="info.php">
        <input type="submit" name="cancel" value="Logout" id="logininput">
        <input type="submit" name="cancel" value="Cancel" id="logininput">
    </form>
    
</div>
</body>
</html>



<?php

if (isset($_GET['apartment'])) {
    $stmt = $pdo->prepare('SELECT * FROM apartment WHERE apartment = :u');
    $stmt->execute(array(':u' => $_GET['apartment']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo('Apartment:'.$row['apartment'].'<br>');
        echo('Amenities:'.$row['apartment'].'<br>');
        echo('Call:'.$row['apartment'].'<br>');
        echo('Photos:'.$row['image'].'<br>');
        echo('Pricing:'.$row['apartment']);
// Fall through into the View
}
else{
    header("Location: login.php");
}

?>
<style>
	body {
    height: 100vh;
    padding:0;
  margin:0;
    font-size: ;
    color:  white;
    text-align: center;
    background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
    background-size: 400% 400%;
    animation: gradient 15s ease infinite;
    height: 100vh;
    background-color: #ADD8E6;
}
</style>
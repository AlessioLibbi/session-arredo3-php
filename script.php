<?php 
session_start();
$newPlayer = $_POST["name"];
    
    array_push($_SESSION["myPlayers"], $newPlayer,);
    $myPlayers = $_SESSION["myPlayers"];
   


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="script.php" method="POST">
        
        <label for="name">
            <input name="name" id="name" type="text">
        </label>
       
        <button type="submit">Aggiungilo alla rosa</button>
    </form>
<div>
        <ul>
            <li>
                <?php 
                
                foreach($myPlayers as $player) {
                    echo $player . "<br>";
                }?>
            </li>
        </ul>
  
    </div>
  
</body>
</html>

<?php
 
?>
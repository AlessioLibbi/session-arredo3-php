<?php 
session_start();
$newPlayer = $_POST["name"];
    array_push($_SESSION["myPlayers"], $newPlayer,);
    $myPlayers = $_SESSION["myPlayers"];

    function delete($del) {
        unset($del);
    }

    function update($id) {
        if (isset($_GET['edit'])) {
            $id = $_GET['edit'];
            $update = true;
            
        }
    }
   


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
        <?php  foreach($myPlayers as $player) { ?>
            <li>
                <?php echo $player . "<br>"; ?> 
                <form action=""></form> 
                <?php if ($update == true): ?>
                <a href="script.php?edit=<?php  ?>" class="edit_btn" >Edit</a>
                <?php else :?>
                <a href="script.php?del=<?php  ?>" class="del_btn">Delete</a>
                <?php endif ?>
            </li>
            <?php } ?>
        </ul>
  
    </div>
  
</body>
</html>

<?php
 
?>
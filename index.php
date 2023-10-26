<?php 


class Machine {
    private $id;
    private $name;



    function __construct( $name)
    {
        $this->id = uniqid();
        $this->name = $name;
       
    }
    function getId() {
        return $this->id;
    }
    function getName() {
        return $this->name;
    }
}

interface IStoreMachine {
    function add($name);
    function get();
    function edit($id, $name);
    function delete($id);
};

class MachineInSession implements IStoreMachine {
    

    function __construct()
    {
        session_start();

        if(!isset($_SESSION["machines"])) {
            $_SESSION["machines"] = array();
            $mach = $_SESSION["machine"];
            return $mach;
        }

    }

    function add($name){

        array_push($mach, new Machine($name));
        
    }
    function get(){
        $mach = $_SESSION["machine"];
        return $mach;
    }
    function edit($id, $name){

    }
    function delete($id){

    }

}
$machineRepo = new MachineInSession();





if(isset($_POST['action'])){
    if($_POST['action'] == 'create') {
        $machineRepo->add($_POST['name']);
    } else if ($_POST['action'] == 'update') {
        $machineRepo->edit($_POST['id'], $_POST['name']);
    } else if ($_POST['action'] == 'delete') {
        $machineRepo->delete($_POST['id']);
    }
}

$machines = $machineRepo->get();
// var_dump($machines);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session</title>
</head>
<body>
    <h1>Questa e la tua rosa vuoi aggiungere qualcuno ?</h1>
    <div>
        <?php foreach ($machines as $machine) {  ?>
        <form action="index.php" method="POST">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" value="<?php echo $machine->getId();?>">
            <input type="text" name="name" value="<?php echo $machine->getName();?>">
            <input type="submit" value="UPDATE">
        </form>
        <form action="index.php" method="POST">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="id" value="<?php echo $machine->getId();?>">
            <input type="submit" value="DELETE">
            
        </form>
        <?php } ?>
    </div>
    <form action="index.php" method="POST">
        <input type="hidden" name="action" value="create">
        <input type="text" name="name">
        <input type="submit" value="CREATE">
    </form>
  
    

   
</body>
</html>
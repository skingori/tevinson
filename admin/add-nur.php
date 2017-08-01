<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 01/04/2017
 * Time: 11:24
 */
// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
if (isset($_SESSION['logname']) && isset($_SESSION['rank'])) {
    switch($_SESSION['rank']) {

        case 2:
            header('location:../user/index.php');//redirect to  page
            break;

    }
}elseif(!isset($_SESSION['logname']) && !isset($_SESSION['rank'])) {
    header('Location:../sessions.php');
}
else
{

    header('Location:index.php');
}
?>
<?php


// Create connection
include "../connection/db.php";
// Check connection

if(isset($_POST['add'])) {

    $Nurse_Id_ =$_POST['Nurse_Id'];
    $Nurse_Name_ =$_POST['Nurse_Name'];
    $Nurse_Department_ =$_POST['Nurse_Department'];
    $Nurse_Rank_ =$_POST['Nurse_Rank'];


    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $sql = "INSERT INTO  nurse_details(Nurse_Id,Nurse_Name ,Nurse_Department ,Nurse_Rank)
VALUES ('$Nurse_Id_', '$Nurse_Name_' ,'$Nurse_Department_','$Nurse_Rank_')";

    if ($con->query($sql) === TRUE) {
        $msg = "<div class='alert alert-success'>
            <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
            </div>";
    } else {

        $msg = "<div class='alert alert-danger'>
            <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
            </div>" . $sql . "<br>" . $con->error;
    }

    $con->close();
}

?>

<?php include "baseh.php";?>

<!-- Add content -->

<form id="" method="POST">
    <?php
    if (isset($msg)) {
        echo $msg;
    }
    ?>

    <div class="form-group label-floating">
        <label class="control-label">Nurse Id</label>
        <input type="text" class="form-control" required name="Nurse_Id">
    </div>
    <div class="form-group label-floating">
        <label class="control-label">Nurse Name</label>
        <input type="text" class="form-control" required name="Nurse_Name">
    </div>
    <div class="form-group label-floating">
        <label class="control-label">Nurse Department</label>
        <input type="text" class="form-control" required name="Nurse_Department">
    </div>
    <div class="form-group label-floating">
        <label class="control-label">Nurse Rank</label>
        <input type="text" class="form-control" required name="Nurse_Rank">
    </div>
    <div class="form-group">

        <button type="submit" class="btn btn-primary" name="add" >Add Nurse</button>

    </div>


</form>

<!-- #END# add content -->

<?php include "basef.php";?>
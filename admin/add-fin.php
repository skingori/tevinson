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

    $Fingerprint_Volunteer_Id_ =$_POST['Fingerprint_Volunteer_Id'];


    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $sql = "INSERT INTO fingerprint_details(Fingerprint_Volunteer_Id)
VALUES ('$Fingerprint_Volunteer_Id_')";

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
        <label class="control-label">Volunteer Id</label>
        <input type="text" class="form-control" required name="Fingerprint_Volunteer_Id">
    </div>
    <div class="form-group label-floating">
        <i class="material-icons">add-photo</i>
        <input type="file" class="form-control" name="">
    </div>

    <div class="form-group">

        <button type="submit" class="btn btn-primary" name="add" >Add Finger-prints</button>

    </div>


</form>

<!-- #END# add content -->

<?php include "basef.php";?>
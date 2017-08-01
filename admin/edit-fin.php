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
$edit=$_GET['edit'];

$result1 = mysqli_query($con, "SELECT * FROM fingerprint_details WHERE Fingerprint_Id='$edit'");

while($res = mysqli_fetch_array($result1))
{
    $Fingerprint_Volunteer_Id= $res['Fingerprint_Volunteer_Id'];


}


if(isset($_POST['add'])) {


    $Fingerprint_Volunteer_Id_ =$_POST['Fingerprint_Volunteer_Id'];

    //updating the table
    $result = mysqli_query($con, "UPDATE fingerprint_details SET Fingerprint_Volunteer_Id='$Fingerprint_Volunteer_Id_' WHERE Fingerprint_Id=$edit");



    $msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Nurse Updated !
					</div>";

    echo '<meta content="2;all-prints.php" http-equiv="refresh" />';
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
            <input type="text" class="form-control" required name="Fingerprint_Volunteer_Id" value="<?php echo $edit?>" >
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
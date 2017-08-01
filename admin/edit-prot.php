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

$result1 = mysqli_query($con, "SELECT * FROM protocol_details WHERE Protocol_Id='$edit'");

while($res = mysqli_fetch_array($result1))
{
    $Protocol_Name =$res['Protocol_Name'];
    $Protocol_Description =$res['Protocol_Description'];
    $Protocol_Duration =$res['Protocol_Duration'];
    $Protocol_Nurse_Id =$res['Protocol_Nurse_Id'];
    $Protocol_Doctor_Id =$res['Protocol_Doctor_Id'];
    $Protocol_Volunteer_Id =$res['Protocol_Volunteer_Id'];

}


if(isset($_POST['add'])) {


    $Protocol_Name_ =$_POST['Protocol_Name'];
    $Protocol_Description_ =$_POST['Protocol_Description'];
    $Protocol_Duration_ =$_POST['Protocol_Duration'];
    $Protocol_Nurse_Id_ =$_POST['Protocol_Nurse_Id'];
    $Protocol_Doctor_Id_ =$_POST['Protocol_Doctor_Id'];
    $Protocol_Volunteer_Id_ =$_POST['Protocol_Volunteer_Id'];


    //updating the table
    $result = mysqli_query($con, "UPDATE protocol_details SET Protocol_Name='$Protocol_Name_', 
Protocol_Description='$Protocol_Description_',
Protocol_Duration='$Protocol_Duration_',
Protocol_Nurse_Id='$Protocol_Nurse_Id_',
Protocol_Doctor_Id='$Protocol_Doctor_Id_',
Protocol_Volunteer_Id='$Protocol_Volunteer_Id_'
 WHERE Protocol_Id=$edit");



    $msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp;Protocol Updated !
					</div>";

    echo '<meta content="2;all-prot.php" http-equiv="refresh" />';
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
            <label class="control-label">Protocol Name</label>
            <input type="text" class="form-control" required name="Protocol_Name" value="<?php echo $Protocol_Name?>">
        </div>
        <div class="form-group label-floating">
            <label class="control-label">Protocol Description</label>
            <input type="text" class="form-control" required name="Protocol_Description" value="<?php echo $Protocol_Description?>">
        </div>
        <div class="form-group label-floating">
            <label class="control-label">Protocol Duration</label>
            <input type="text" class="form-control" required name="Protocol_Duration" value="<?php echo $Protocol_Duration?>">
        </div>
        <div class="form-group label-floating">
            <label class="control-label">Nurse Id</label>
            <input type="text" class="form-control" required name="Protocol_Nurse_Id" value="<?php echo $Protocol_Nurse_Id?>">
        </div>
        <div class="form-group label-floating">
            <label class="control-label">Doctor Id</label>
            <input type="text" class="form-control" required name="Protocol_Doctor_Id" value="<?php echo $Protocol_Doctor_Id?>">
        </div>
        <div class="form-group label-floating">
            <label class="control-label">Volunteer Id</label>
            <input type="text" class="form-control" required name="Protocol_Volunteer_Id" value="<?php echo $Protocol_Volunteer_Id?>">
        </div>
        <div class="form-group">

            <button type="submit" class="btn btn-primary" name="add" >Update Protocol</button>

        </div>


    </form>

    <!-- #END# add content -->

<?php include "basef.php";?>
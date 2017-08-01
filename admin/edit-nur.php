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

$result1 = mysqli_query($con, "SELECT * FROM nurse_details WHERE Nurse_Id='$edit'");

while($res = mysqli_fetch_array($result1))
{
    $Nurse_Name= $res['Nurse_Name'];
    $Nurse_Department= $res['Nurse_Department'];
    $Nurse_Rank= $res['Nurse_Rank'];

}


if(isset($_POST['add'])) {


    $Nurse_Name_ =$_POST['Nurse_Name'];
    $Nurse_Department_ =$_POST['Nurse_Department'];
    $Nurse_Rank_ =$_POST['Nurse_Rank'];


    //updating the table
    $result = mysqli_query($con, "UPDATE nurse_details SET Nurse_Name='$Nurse_Name_', 
Nurse_Department='$Nurse_Department_',Nurse_Rank='$Nurse_Rank_' WHERE Nurse_Id=$edit");



    $msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Nurse Updated !
					</div>";

    echo '<meta content="2;all-nurse.php" http-equiv="refresh" />';
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
            <input type="text" class="form-control" required name="Nurse_Id" value="<?php echo $edit?>" readonly>
        </div>
        <div class="form-group label-floating">
            <label class="control-label">Nurse Name</label>
            <input type="text" class="form-control" required name="Nurse_Name" value="<?php echo $Nurse_Name?>">
        </div>
        <div class="form-group label-floating">
            <label class="control-label">Nurse Department</label>
            <input type="text" class="form-control" required name="Nurse_Department" value="<?php echo $Nurse_Department?>">
        </div>
        <div class="form-group label-floating">
            <label class="control-label">Nurse Rank</label>
            <input type="text" class="form-control" required name="Nurse_Rank" value="<?php echo $Nurse_Rank?>">
        </div>
        <div class="form-group">

            <button type="submit" class="btn btn-primary" name="add" >Update Nurse</button>

        </div>


    </form>

    <!-- #END# add content -->

<?php include "basef.php";?>
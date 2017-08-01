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

$result1 = mysqli_query($con, "SELECT * FROM doctors_details WHERE Dostor_Id='$edit'");

while($res = mysqli_fetch_array($result1))
{
    $Doctor_Name= $res['Doctor_Name'];
    $Doctor_Rank= $res['Doctor_Rank'];

}


if(isset($_POST['add'])) {


    $Dostor_Id_ =$_POST['Dostor_Id'];
    $Doctor_Name_ =$_POST['Doctor_Name'];
    $Doctor_Rank_ =$_POST['Doctor_Rank'];


    //updating the table
    $result = mysqli_query($con, "UPDATE doctors_details SET Doctor_Name='$Doctor_Name_', 
Doctor_Rank='$Doctor_Rank_' WHERE Dostor_Id=$edit");



    $msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Nurse Updated !
					</div>";

    echo '<meta content="2;all-docs.php" http-equiv="refresh" />';
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
            <label class="control-label">Doctor Id</label>
            <input type="text" class="form-control" required name="Dostor_Id" value="<?php echo $edit?>"  readonly>
        </div>
        <div class="form-group label-floating">
            <label class="control-label">Doctor Name</label>
            <input type="text" class="form-control" required name="Doctor_Name" value="<?php echo $Doctor_Name?>">
        </div>
        <div class="form-group label-floating">
            <label class="control-label">Doctor Rank</label>
            <input type="text" class="form-control" required name="Doctor_Rank" value="<?php echo $Doctor_Rank?>">
        </div>
        <div class="form-group">

            <button type="submit" class="btn btn-primary" name="add" >Update Doc</button>

        </div>


    </form>

    <!-- #END# add content -->

<?php include "basef.php";?>
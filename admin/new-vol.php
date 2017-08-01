
<?php


// Create connection
include "../connection/db.php";
// Check connection

if(isset($_POST['add'])) {

    $Volunteer_Id_ =$_POST['Volunteer_Id'];
    $Volunteer_Name_ =$_POST['Volunteer_Name'];
    $Voluteer_Age_ =$_POST['Voluteer_Age'];
    $Volunteer_Gender_ =$_POST['Volunteer_Gender'];
    $Volunteer_Figerprint_Id_ =$_POST['Volunteer_Figerprint_Id'];


    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $sql = "INSERT INTO volunteer_details(Volunteer_Id,Volunteer_Name,Voluteer_Age ,Volunteer_Gender,Volunteer_Figerprint_Id)
VALUES ('$Volunteer_Id_', '$Volunteer_Name_' ,'$Voluteer_Age_','$Volunteer_Gender_','$Volunteer_Figerprint_Id_')";

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
        <input type="text" class="form-control" required name="Volunteer_Id">
    </div>
    <div class="form-group label-floating">
        <label class="control-label">Nurse Name</label>
        <input type="text" class="form-control" required name="Volunteer_Name">
    </div>
    <div class="form-group label-floating">
        <label class="control-label">Age</label>
        <input type="text" class="form-control" required name="Voluteer_Age">
    </div>
    <div class="form-group label-floating">
        <label class="control-label">Gender</label>
        <select name="Volunteer_Gender" class="form-control">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </div>
    <div class="form-group label-floating">
        <label class="control-label">Figerprint Id</label>
        <input type="text" class="form-control" required name="Volunteer_Figerprint_Id">
    </div>
    <div class="form-group">

        <button type="submit" class="btn btn-primary" name="add" >Add Vol</button>

    </div>


</form>

<!-- #END# add content -->

<?php include "basef.php";?>
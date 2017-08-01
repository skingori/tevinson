
<?php


// Create connection
include "../connection/db.php";
// Check connection

if(isset($_POST['add'])) {

    $Protocol_Name_ =$_POST['Protocol_Name'];
    $Protocol_Description_ =$_POST['Protocol_Description'];
    $Protocol_Duration_ =$_POST['Protocol_Duration'];
    $Protocol_Nurse_Id_ =$_POST['Protocol_Nurse_Id'];
    $Protocol_Doctor_Id_ =$_POST['Protocol_Doctor_Id'];
    $Protocol_Volunteer_Id_ =$_POST['Protocol_Volunteer_Id'];


    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $sql = "INSERT INTO  protocol_details(Protocol_Name,Protocol_Description, Protocol_Duration,Protocol_Nurse_Id, Protocol_Doctor_Id,Protocol_Volunteer_Id)
VALUES ('$Protocol_Name_', '$Protocol_Description_' ,'$Protocol_Duration_','$Protocol_Nurse_Id_','$Protocol_Doctor_Id_','$Protocol_Volunteer_Id_')";

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
        <label class="control-label">Protocol Name</label>
        <input type="text" class="form-control" required name="Protocol_Name">
    </div>
    <div class="form-group label-floating">
        <label class="control-label">Protocol Description</label>
        <input type="text" class="form-control" required name="Protocol_Description">
    </div>
    <div class="form-group label-floating">
        <label class="control-label">Protocol Duration</label>
        <input type="text" class="form-control" required name="Protocol_Duration">
    </div>
    <div class="form-group label-floating">
        <label class="control-label">Nurse Id</label>
        <input type="text" class="form-control" required name="Protocol_Nurse_Id">
    </div>
    <div class="form-group label-floating">
        <label class="control-label">Doctor Id</label>
        <input type="text" class="form-control" required name="Protocol_Doctor_Id">
    </div>
    <div class="form-group label-floating">
        <label class="control-label">Volunteer Id</label>
        <input type="text" class="form-control" required name="Protocol_Volunteer_Id">
    </div>
    <div class="form-group">

        <button type="submit" class="btn btn-primary" name="add" >Add Protocal</button>

    </div>


</form>

<!-- #END# add content -->

<?php include "basef.php";?>
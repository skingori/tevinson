
<?php


// Create connection
include "../connection/db.php";
// Check connection

if(isset($_POST['add'])) {

    $Staff_Login_Id_ =$_POST['Staff_Login_Id'];
    $Staff_Login_Name_ =$_POST['Staff_Login_Name'];
    $Staff_Login_Password =$_POST['Staff_Login_Password'];
    $Staff_Login_Password_= md5($Staff_Login_Password);


    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $sql = "INSERT INTO  staff_login(Staff_Login_Id ,Staff_Login_Name ,Staff_Login_Password,Staff_Login_Rank)
VALUES ('$Staff_Login_Id_', '$Staff_Login_Name_' ,'$Staff_Login_Password_','1')";

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
        <label class="control-label">Staff Id</label>
        <input type="text" class="form-control" required name="Staff_Login_Id">
    </div>
    <div class="form-group label-floating">
        <label class="control-label">Username</label>
        <input type="text" class="form-control" required name="Staff_Login_Name">
    </div>
    <div class="form-group label-floating">
        <label class="control-label">Password</label>
        <input type="password" class="form-control" required name="Staff_Login_Password">
    </div>

    <div class="form-group">

        <button type="submit" class="btn btn-primary" name="add" >Add Staff</button>

    </div>


</form>

<!-- #END# add content -->

<?php include "basef.php";?>
<?php
/**
 * Created by PhpStorm.
 * User: king
 * Date: 02/04/2017
 * Time: 00:07
 */


//including the database connection file
include("../connection/db.php");


if (isset($_GET['nurse'])){
    $nurse =$_GET['nurse']; //deleting feeds
    $result = mysqli_query($con, "DELETE FROM nurse_details WHERE Nurse_Id=$nurse ");

    header("Location:all-nurse.php?msg");

}

if (isset($_GET['fin'])){
    $fin =$_GET['fin']; //deleting feeds
    $result = mysqli_query($con, "DELETE FROM fingerprint_details WHERE Fingerprint_Id=$fin ");

    header("Location:all-prints.php");

}

if (isset($_GET['doc'])){
    $doc =$_GET['doc']; //deleting feeds
    $result = mysqli_query($con, "DELETE FROM doctors_details WHERE Dostor_Id=$doc ");

    header("Location:all-docs.php");

}

if (isset($_GET['prot'])){
    $prot =$_GET['prot']; //deleting feeds
    $result = mysqli_query($con, "DELETE FROM protocol_details WHERE Protocol_Id=$prot ");

    header("Location:all-prot.php");

}

if (isset($_GET['vol'])){
    $vol =$_GET['vol']; //deleting feeds
    $result = mysqli_query($con, "DELETE FROM volunteer_details WHERE Volunteer_Id=$vol ");

    header("Location:index.php");

}


?>
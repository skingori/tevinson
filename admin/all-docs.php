<?php include "baseh.php";?>
<!-- -->
<?php

include "../connection/db.php";
// Check connection


$result = mysqli_query($con, "SELECT * FROM doctors_details ORDER BY Dostor_Id ASC");
?>
<div class="card">
    <div class="card-header" data-background-color="green">
        <small i class="category">All doctors </small>
    </div>
    <div class="card-content table-responsive">
        <table class="table" id="table1">
            <thead class="text-primary">
            <th>Id</th>
            <th>Name</th>
            <th>Doctor Rank</th>
            <th></th>
            </thead>
            <tbody>

            <?php
            //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
            while($res = mysqli_fetch_array($result)) {
                echo "<tr class=''>";
                echo "<td class='text-primary'>".$res['Dostor_Id']."</td>";
                echo "<td>".$res['Doctor_Name']."</td>";
                echo "<td class=''>".$res['Doctor_Rank']."</td>";
                echo "<td><a href=\"edit-doc.php?edit=$res[Dostor_Id]\" style='color: #3DA0DB' class='fa fa-pencil'></a> &nbsp;<a href=\"delete.php?doc=$res[Dostor_Id]\" onClick=\"return confirm('Are you sure you want to delete?')\" style='color: red' class='fa fa-trash-o'></a></td>";

            }
            ?>
            </tbody>
            <tfoot class="bg-success">
            <th>Id</th>
            <th>Name</th>
            <th>Doctor Rank</th>
            <th></th>
            </tfoot>
        </table>

    </div>
</div>
<!-- -->
<?php include "basef.php";?>
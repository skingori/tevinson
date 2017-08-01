<?php include "baseh.php";?>
    <!-- -->
<?php

include "../connection/db.php";
// Check connection


$result = mysqli_query($con, "SELECT * FROM protocol_details ORDER BY Protocol_Id ASC");
?>
    <div class="card">
        <div class="card-header" data-background-color="green">
            <p class="category">This is a list of all registered protocals </p>
        </div>
        <div class="card-content table-responsive">
            <table class="table" id="table1">
                <thead class="text-primary">
                <th>Protocol Id</th>
                <th>Protocol Name</th>
                <th>Description</th>
                <th>Duration</th>
                <th>Nurse Id</th>
                <th>Doctor Id</th>
                <th>Volunteer Id</th>
                <th></th>
                </thead>
                <tbody>

                <?php
                //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
                while($res = mysqli_fetch_array($result)) {
                    echo "<tr class=''>";
                    echo "<td class='text-primary'>".$res['Protocol_Id']."</td>";
                    echo "<td>".$res['Protocol_Name']."</td>";
                    echo "<td class=''>".$res['Protocol_Description']."</td>";
                    echo "<td class=''>".$res['Protocol_Duration']."</td>";
                    echo "<td class=''>".$res['Protocol_Nurse_Id']."</td>";
                    echo "<td class=''>".$res['Protocol_Doctor_Id']."</td>";
                    echo "<td class=''>".$res['Protocol_Volunteer_Id']."</td>";
                    echo "<td><a href=\"edit-prot.php?edit=$res[Protocol_Id]\" style='color: #3DA0DB' class='fa fa-pencil'></a> &nbsp;<a href=\"delete.php?prot=$res[Protocol_Id]\" onClick=\"return confirm('Are you sure you want to delete?')\" style='color: red' class='fa fa-trash-o'></a></td>";

                }
                ?>
                </tbody>
                <tfoot class="bg-info">
                <th>Protocol Id</th>
                <th>Protocol Name</th>
                <th>Description</th>
                <th>Duration</th>
                <th>Nurse Id</th>
                <th>Doctor Id</th>
                <th>Volunteer Id</th>
                <th></th>
                </tfoot>
            </table>

        </div>
    </div>
    <!-- -->
<?php include "basef.php";?>
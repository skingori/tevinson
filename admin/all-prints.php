<?php include "baseh.php";?>
    <!-- -->
<?php

include "../connection/db.php";
// Check connection


$result = mysqli_query($con, "SELECT * FROM fingerprint_details ORDER BY Fingerprint_Id ASC");
?>
    <div class="card">
        <div class="card-header" data-background-color="green">
            <p class="category">This is a list of all registered finger-prints </p>
        </div>
        <div class="card-content table-responsive">
            <table class="table" id="table1">
                <thead class="text-primary">
                <th>Fingerprint Id</th>
                <th>Volunteer Id</th>
                <th></th>

                </thead>
                <tbody>

                <?php
                //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
                while($res = mysqli_fetch_array($result)) {
                    echo "<tr class=''>";
                    echo "<td class='text-primary'>".$res['Fingerprint_Id']."</td>";
                    echo "<td>".$res['Fingerprint_Volunteer_Id']."</td>";
                    echo "<td><a href=\"edit-fin.php?edit=$res[Fingerprint_Id]\" style='color: #3DA0DB' class='fa fa-pencil'></a> &nbsp;<a href=\"delete.php?fin=$res[Fingerprint_Id]\" onClick=\"return confirm('Are you sure you want to delete?')\" style='color: red' class='fa fa-trash-o'></a></td>";

                }
                ?>
                </tbody>
                <tfoot class="bg-success">
                <th>Fingerprint Id</th>
                <th>Volunteer Id</th>
                <th></th>
                </tfoot>
            </table>

        </div>
    </div>
    <!-- -->
<?php include "basef.php";?>
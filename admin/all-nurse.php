<?php include "baseh.php";?>
    <!-- -->
<?php

include "../connection/db.php";
// Check connection


$result = mysqli_query($con, "SELECT * FROM nurse_details ORDER BY Nurse_Id ASC");
?>
    <div class="card">
        <div class="card-header" data-background-color="green">
            <p class="category">This is a list of all registered nurses </p>
        </div>
        <div class="card-content table-responsive">
            <table class="table" id="table1">
                <thead class="text-primary">
                <th>Nurse Id</th>
                <th>Nurse Name</th>
                <th>Nurse Department</th>
                <th>Nurse Rank</th>
                <th></th>
                </thead>
                <tbody>

                <?php
                //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
                while($res = mysqli_fetch_array($result)) {
                    echo "<tr class=''>";
                    echo "<td class='text-primary'>".$res['Nurse_Id']."</td>";
                    echo "<td>".$res['Nurse_Name']."</td>";
                    echo "<td class=''>".$res['Nurse_Department']."</td>";
                    echo "<td class=''>".$res['Nurse_Rank']."</td>";
                    echo "<td><a href=\"edit-nur.php?edit=$res[Nurse_Id]\" style='color: #3DA0DB' class='fa fa-pencil'></a> &nbsp;<a href=\"delete.php?nurse=$res[Nurse_Id]\" onClick=\"return confirm('Are you sure you want to delete?')\" style='color: red' class='fa fa-trash-o'></a></td>";

                }
                ?>
                </tbody>
                <tfoot class="bg-success">
                <th>Nurse Id</th>
                <th>Nurse Name</th>
                <th>Nurse Department</th>
                <th>Nurse Rank</th>
                <td></td>
                </tfoot>
            </table>

        </div>
    </div>
    <!-- -->
<?php include "basef.php";?>
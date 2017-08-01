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

                </thead>
                <tbody>

                <?php
                //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
                while($res = mysqli_fetch_array($result)) {
                    echo "<tr class=''>";
                    echo "<td class='text-primary'>".$res['Fingerprint_Id']."</td>";
                    echo "<td>".$res['Fingerprint_Volunteer_Id']."</td>";
                }
                ?>
                </tbody>
            </table>

        </div>
    </div>
    <!-- -->
<?php include "basef.php";?>